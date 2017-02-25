<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
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
        $users = User::paginate();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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

            $user = User::create([
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
            $user->assignRole($request->input('role'));
        }catch (\Exception $e) {
            \DB::rollback();
        }finally {
            \DB::commit();
        }

        return redirect('/users')->with('mensaje', 'Usuario Creado');
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
        $user = User::findOrFail($id);
        return view('users.edit', ['user'=>$user]);
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
        User::destroy($id);
        return redirect('/users')->with('mensaje', 'Usuario Eliminado');
    }
}
