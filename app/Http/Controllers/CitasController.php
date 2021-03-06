<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Especialidad;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator;
use Auth;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!Auth::user()->can('ReadCitas'))
            abort(403, 'Acceso Prohibido');

        $citas = null;
        $buscar = \Request::get('buscar');
        if ($buscar != ''){
            $citas = Cita::fecha($buscar)->paginate(12);
        } else {
            $citas = Cita::where('status', '=', 'activa')->paginate(12);
        }
        return view('citas.index', ['citas'=>$citas, 'buscar'=>$buscar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('CreateCitas'))
            abort(403, 'Acceso Prohibido');
        $pacientes = User::role('paciente')->get();
        $medicos = User::role('medico')->get();
        $especialidades = Especialidad::all();
        return view('citas.create', ['pacientes'=>$pacientes, 'especialidades' => $especialidades, 'medicos'=>$medicos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'especialidad_id' => 'required',
            'status' => 'required',
            'fecha_cita' => 'required',
            'hora' => 'required',
            'observaciones' => 'max:255',
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $cita = Cita::create([
                'especialidad_id' => $request->input('especialidad_id'),
                'paciente_id' => $request->input('paciente_id'),
                'medico_id' => $request->input('medico_id'),
                'status' => $request->input('status'),
                'fecha_cita' => $request->input('fecha_cita'),
                'hora' => $request->input('hora'),
                'observaciones' => $request->input('observaciones'),
            ]);


        }catch (\Exception $e) {
            \DB::rollback();
        }finally {
            \DB::commit();
        }

        return redirect('/citas')->with('mensaje', 'Cita Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('UpdateCitas'))
            abort(403, 'Acceso Prohibido');

        $pacientes = User::role('paciente')->get();
        $medicos = User::role('medico')->get();
        $especialidades = Especialidad::all();
        $cita = Cita::findOrFail($id);
        return view('citas.edit', ['cita'=>$cita, 'pacientes'=>$pacientes, 'especialidades' => $especialidades, 'medicos'=>$medicos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'especialidad_id' => 'required',
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'status' => 'required',
            'fecha_cita' => 'required',
            'hora' => 'required',
            'observaciones' => 'max:255',
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::beginTransaction();

            $cita = Cita::findOrFail($id);
            $cita->update([
                'especialidad_id' => $request->input('especialidad_id'),
                'paciente_id' => $request->input('paciente_id'),
                'medico_id' => $request->input('medico_id'),
                'status' => $request->input('status'),
                'fecha_cita' => $request->input('fecha_cita'),
                'hora' => $request->input('hora'),
                'observaciones' => $request->input('observaciones'),
            ]);

        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/citas')->with('mensaje', 'Cita Creada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->can('DeleteCitas'))
            abort(403,'Acceso Prohibido');

        try{
            \DB::beginTransaction();
            Cita::destroy($id);
        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/citas')->with('mensaje', 'Cita Eliminada');
    }

    public function indexinac()
    {
        $citas = Cita::where('status', '!=', 'activa')->paginate(90);
        return view('citas.indexinac', ['citas'=>$citas]);
    }
}
