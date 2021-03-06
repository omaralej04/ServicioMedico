<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Historial;
use App\Recipe;
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
        if(!Auth::user()->can('ReadUsers'))
            abort(403,'Acceso Prohibido');

        $users = null;
        $buscar = \Request::get('buscar');
        if ($buscar != ''){
            $users = User::role('Paciente')->cedula($buscar)->paginate(1);
        } else{
            $users = User::role('Paciente')->paginate(12);
        }
        return view('users.index', ['users' => $users, 'buscar'=>$buscar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->can('CreateUsers'))
            abort(403,'Acceso Prohibido');

        $roles = Role::all();
        return view('users.create', ['roles'=>$roles]);
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
            'especialidad' => 'max:255',
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
                'especialidad' => $request->input('especialidad'),
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

    public function miscitasactivas()
    {
        $userId = Auth::id();
        $user = \DB::table('users')->where('id', '=', $userId)->get();
        $citas = Cita::where([
            ['paciente_id', '=', $userId], ['status', '=', 'activa'],
        ])->get();

        return view('users.miscitas', ['user'=>$user, 'citas'=>$citas]);
    }

    public function miscitasinac()
    {
        $userId = Auth::id();
        $user = \DB::table('users')->where('id', '=', $userId)->get();
        $citas = Cita::where([
           ['paciente_id', '=', $userId], ['status', '!=', 'activa'],
        ])->get();

        return view('users.miscitasinac', ['user'=>$user, 'citas'=>$citas]);
    }

    public function misrecipes()
    {
        $userId = Auth::id();
        $user = \DB::table('users')->where('id', '=', $userId)->get();
        $historias = \DB::table('historials')->where('paciente_id', '=', $userId)->get();
        $recipes = Recipe::whereIn([
            'consulta_id', '=', $historias->id,
        ])->get();

        return view('users.misrecipes', ['user'=>$user, 'recipes'=>$recipes]);
    }

    public function misrecipesinac()
    {
        $userId = Auth::id();
        $user = \DB::table('users')->where('id', '=', $userId)->get();
        $recipes = Recipe::where([
            ['paciente_id', '=', $userId], ['status', '=', 'entregado'],
        ])->get();

        return view('users.misrecipesinac', ['user'=>$user, 'recipes'=>$recipes]);
    }
}
