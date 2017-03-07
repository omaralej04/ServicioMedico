<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator;
use Auth;

class MedicosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->can('ReadMedicos'))
            abort(403,'Acceso Prohibido');

        $medicos = User::role('Medico')->paginate();
        return view('medicos.index', ['medicos' => $medicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->can('CreateMedicos'))
            abort(403,'Acceso Prohibido');

        $roles = Role::all();
        $especialidades = Especialidad::all();
        return view('medicos.create', ['roles'=>$roles, 'especialidades' => $especialidades]);
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
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'cedula' => 'required|max:10|unique:users',
            'fecha_nacimiento' => 'required|max:32',
            'sexo' => 'required',
            'direccion' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'telefono' => 'max:255',
            'celular' => 'max:255',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
            'especialidad_id' => 'required'
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $medico = User::create([
                'nombre' => $request->input('nombre'),
                'apellido' => $request->input('apellido'),
                'cedula' => $request->input('cedula'),
                'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                'sexo' => $request->input('sexo'),
                'direccion' => $request->input('direccion'),
                'email' => $request->input('email'),
                'telefono' => $request->input('telefono'),
                'celular' => $request->input('celular'),
                'password' => bcrypt($request->input('password')),
                'especialidad_id' => $request->input('especialidad_id'),
            ]);
            $medico->assignRole($request->input('role'));
        }catch (\Exception $e) {
            \DB::rollback();
        }finally {
            \DB::commit();
        }

        return redirect('/medicos')->with('mensaje', 'Usuario Creado');
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
        if(!Auth::user()->can('UpdateMedicos'))
            abort(403,'Acceso Prohibido');

        $roles = Role::all();
        $especialidades = Especialidad::all();
        $medico = User::findOrFail($id);
        return view('medicos.edit', ['medico'=>$medico, 'roles'=>$roles, 'especialidades'=>$especialidades]);
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
            'role' => 'required',
            'especialidad_id' => 'required',
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::beginTransaction();

            $medico = User::findOrFail($id);
            $medico->update([
                'nombre' => $request->input('nombre'),
                'apellido' => $request->input('apellido'),
                'cedula' => $request->input('cedula'),
                'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                'sexo' => $request->input('sexo'),
                'direccion' => $request->input('direccion'),
                'email' => $request->input('email'),
                'telefono' => $request->input('telefono'),
                'celular' => $request->input('celular'),
                'especialidad_id' => $request->input('especialidad_id')
            ]);

            if ($request->input('password')){
                $v = Validator::make($request->all(), [
                    'password' => 'required|min:6|confirmed',
                ]);

                if ($v->fails()){
                    return redirect()->back()->withErrors($v)->withInput();
                }
                $medico->update([
                    'password' => bcrypt($request->input('password')),
                ]);
            }

            $medico->syncRoles($request->input('role'));

        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/medicos')->with('mensaje', 'Usuario Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->can('DeletePermisos'))
            abort(403,'Acceso Prohibido');

        User::destroy($id);
        return redirect('/medicos')->with('mensaje', 'Usuario Eliminado');
    }
}