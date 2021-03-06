<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Especialidad;
use App\Historial;
use App\Medicina;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Recipe;

class HistorialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userHistoria($id)
    {
        if(!Auth::user()->can('ReadHistorias'))
            abort(403, 'Acceso Prohibido');

        $user = User::findOrFail($id);
        $historias = Historial::where('paciente_id', '=', $id)->paginate();
        return view('users.historias', ['user' => $user, 'historias'=>$historias]);
    }

    public function historiaCreate($id)
    {
        if(!Auth::user()->can('CreateHistorias'))
            abort(403, 'Acceso Prohibido');

        $user = User::findOrFail($id);
        $medicos = User::role('Medico')->paginate(30);
        $especialidades = Especialidad::all();
        $medicinas = Medicina::all();
        $citas = Cita::where([
            ['paciente_id', '=', $id], ['status', '=', 'activa'],
        ])->get();

        return view('users.historiascreate', ['user'=>$user, 'medicos'=>$medicos, 'especialidades'=>$especialidades,
            'citas'=>$citas, 'medicinas'=>$medicinas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->input());

//        $v = Validator::make($request->all(), [
//            'paciente_id' => 'required',
//            'especialidad_id' => 'required',
//            'medico_id' => 'required',
//            'cita_id' => 'required',
//            'informe' => 'required',
//            'receta' => 'max:955',
//            'observaciones' => 'required',
//            'consulta_id' => 'required',
//            'status' => 'required',
//            'descripcion' => 'required',
//            'medicinas' => 'required'
//        ]);
//
//        if ($v->fails()){
//            return redirect()->back()->withErrors($v)->withInput();
//        }

        try {
            \DB::beginTransaction();

            $historia = Historial::create([
                'paciente_id' => $request->input('paciente_id'),
                'especialidad_id' => $request->input('especialidad_id'),
                'medico_id' => $request->input('medico_id'),
                'cita_id' => $request->input('cita_id'),
                'informe' => $request->input('informe'),
                'receta' => $request->input('receta'),
                'observaciones' => $request->input('observaciones'),
            ]);

            //dd($historia);

            $recipe = Recipe::create([
                'consulta_id' => $historia->id,
                'status' => $request->input('status'),
                'descripcion' => $request->input('descripcion'),
            ]);

            //dd($request->input());


            $recipe->medicina()->sync($request->input('medicinas'));

            //dd($medicinas);

            $cita = Cita::findOrFail($request->input('cita_id'));
            $cita->update([
                'status' => 'inactiva'
            ]);


        }catch (\Exception $e) {
            \DB::rollback();
        }finally {
            \DB::commit();
        }

        return redirect('/users')->with('mensaje', 'Historia Creada');
    }

    public function destroy($id)
    {
        if(!Auth::user()->can('DeleteHistorias'))
            abort(403, 'Acceso Prohibido');

        Historial::destroy($id);
        return redirect('/users')->with('mensaje', 'Historia Eliminada');
    }
}
