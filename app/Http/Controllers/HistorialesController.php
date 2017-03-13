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

class HistorialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userHistoria($id)
    {
        $user = User::findOrFail($id);
        $historias = Historial::where('paciente_id', '=', $id)->paginate();
        return view('users.historias', ['user' => $user, 'historias'=>$historias]);
    }

    public function historiaCreate($id)
    {
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
        $v = Validator::make($request->all(), [
            'paciente_id' => 'required',
            'especialidad_id' => 'required',
            'medico_id' => 'required',
            'cita_id' => 'required',
            'informe' => 'required',
            'receta' => 'max:955',
            'observaciones' => 'required',
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $historia = Historial::create([
                'paciente_id' => $request->input('paciente_id'),
                'especialidad_id' => $request->input('especialidad_id'),
                'medico_id' => $request->input('medico_id'),
                'cita_id' => $request->input('cita_id'),
                'informe' => $request->input('informe'),
                'receta' => $request->input('receta').','.$request->input('receta2').','.$request->input('receta3'),
                'observaciones' => $request->input('observaciones'),
            ]);

            $cita = Cita::findOrFail($request->input('cita_id'));
            $cita->update([
                'status' => 'inactiva'
            ]);

        }catch (\Exception $e) {
            \DB::rollback();
        }finally {
            \DB::commit();
        }

        return redirect('/users')->with('mensaje', 'Usuario Creado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::user()->can('UpdateUsers'))
            abort(403,'Acceso Prohibido');

        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('users.edit', ['user'=>$user, 'roles'=>$roles]);
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
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'cedula' => 'required|max:10|unique:users,cedula,'.$id.',id',
            'fecha_nacimiento' => 'required|max:32',
            'sexo' => 'required',
            'direccion' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id.',id',
            'telefono' => 'max:255',
            'celular' => 'max:255',
            'especialidad' => 'max:255',
            'role' => 'required',
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::beginTransaction();

            $user = User::findOrFail($id);
            $user->update([
                'nombre' => $request->input('nombre'),
                'apellido' => $request->input('apellido'),
                'cedula' => $request->input('cedula'),
                'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                'sexo' => $request->input('sexo'),
                'direccion' => $request->input('direccion'),
                'email' => $request->input('email'),
                'telefono' => $request->input('telefono'),
                'celular' => $request->input('celular'),
                'especialidad' => $request->input('especialidad'),
            ]);

            if ($request->input('password')){
                $v = Validator::make($request->all(), [
                    'password' => 'required|min:6|confirmed',
                ]);

                if ($v->fails()){
                    return redirect()->back()->withErrors($v)->withInput();
                }
                $user->update([
                    'password' => bcrypt($request->input('password')),
                ]);
            }

            $user->syncRoles($request->input('role'));

        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/users')->with('mensaje', 'Usuario Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->can('DeleteUsers'))
            abort(403, 'Permiso Denegado.');

        User::destroy($id);
        return redirect('/users')->with('mensaje', 'Usuario Eliminado');
    }
}
