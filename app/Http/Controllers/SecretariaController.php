<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SecretariaController extends Controller
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
        if(!Auth::user()->can('ReadSecretarias'))
            abort(403,'Acceso Prohibido');
        $secretarias = null;
        $buscar = \Request::get('buscar');
        if ($buscar != ''){
            $secretarias = User::role('Secretaria')->cedula($buscar)->paginate(1);
        } else{
            $secretarias = User::role('Secretaria')->paginate(12);
        }
        return view('secretarias.index', ['secretarias' => $secretarias, 'buscar'=>$buscar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->can('CreateSecretarias'))
            abort(403,'Acceso Prohibido');

        $roles = Role::all();
        return view('secretarias.create', ['roles'=>$roles]);
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
            'role' => 'required'
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $secretaria = User::create([
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
            ]);
            $secretaria->assignRole('Secretaria');
        }catch (\Exception $e) {
            \DB::rollback();
        }finally {
            \DB::commit();
        }

        return redirect('/secretaria')->with('mensaje', 'Usuario Creado');
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
        if(!Auth::user()->can('UpdateSecretarias'))
            abort(403,'Acceso Prohibido');

        $roles = Role::all();
        $secretaria = User::findOrFail($id);
        return view('secretarias.edit', ['secretaria'=>$secretaria, 'roles'=>$roles]);
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
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::beginTransaction();

            $secretaria = User::findOrFail($id);
            $secretaria->update([
                'nombre' => $request->input('nombre'),
                'apellido' => $request->input('apellido'),
                'cedula' => $request->input('cedula'),
                'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                'sexo' => $request->input('sexo'),
                'direccion' => $request->input('direccion'),
                'email' => $request->input('email'),
                'telefono' => $request->input('telefono'),
                'celular' => $request->input('celular'),
            ]);

            if ($request->input('password')){
                $v = Validator::make($request->all(), [
                    'password' => 'required|min:6|confirmed',
                ]);

                if ($v->fails()){
                    return redirect()->back()->withErrors($v)->withInput();
                }
                $secretaria->update([
                    'password' => bcrypt($request->input('password')),
                ]);
            }

            $secretaria->syncRoles('Secretaria');

        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/secretaria')->with('mensaje', 'Usuario Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->can('DeleteSecretarias'))
            abort(403,'Acceso Prohibido');

        User::destroy($id);
        return redirect('/secretaria')->with('mensaje', 'Usuario Eliminado');
    }
}