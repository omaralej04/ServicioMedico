<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Validator;
use Auth;

class RolesController extends Controller
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
        $roles = Role::paginate();
        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
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
            'name' => 'required|max:10|alpha',
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $role = Role::create([
                'name' => $request->input('name'),
            ]);

        }catch (\Exception $e) {
            \DB::rollback();
        }finally {
            \DB::commit();
        }

        return redirect('/roles')->with('mensaje', 'Rol Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', ['role'=>$role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = User::findOrFail($id);
        return view('roles.edit', ['role'=>$role]);
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
            'name' => 'required|max:50|alpha',
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::beginTransaction();

            $role = Role::findOrFail($id);
            $role->update([
                'name' => $request->input('name'),
            ]);

            if ($request->input('password')){
                $v = Validator::make($request->all(), [
                    'password' => 'required|min:6|confirmed',
                ]);
            }

        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/roles')->with('mensaje', 'Rol Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            \DB::beginTransaction();
            Role::destroy($id);
        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/roles')->with('mensaje', 'Rol Eliminado');
    }
}
