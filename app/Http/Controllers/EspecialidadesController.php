<?php

namespace App\Http\Controllers;

use App\Especialidad;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Validator;
use Auth;

class EspecialidadesController extends Controller
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
        if(!Auth::user()->can('ReadEspecialidades'))
            abort(403,'Acceso Prohibido');

        $especialidades = Especialidad::paginate();
        return view('especialidades.index', ['especialidades' => $especialidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->can('CreateEspecialidades'))
            abort(403,'Acceso Prohibido');
        return view('especialidades.create');
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
            'nombre' => 'required',
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $especialidades = Especialidad::create([
                'nombre' => $request->input('nombre'),
            ]);

        }catch (\Exception $e) {
            \DB::rollback();
        }finally {
            \DB::commit();
        }

        return redirect('/especialidades')->with('mensaje', 'Permiso Creado');
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
        if(!Auth::user()->can('UpdateEspecialidades'))
            abort(403,'Acceso Prohibido');

        $especialidad = Especialidad::findOrFail($id);
        return view('especialidades.edit', ['especialidad'=>$especialidad]);
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
            'nombre' => 'required',
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::beginTransaction();

            $especialidad = Especialidad::findOrFail($id);
            $especialidad->update([
                'nombre' => $request->input('nombre'),
            ]);

        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/especialidades')->with('mensaje', 'Permiso Editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->can('DeleteEspecialidades'))
            abort(403,'Acceso Prohibido');

        try{
            \DB::beginTransaction();
            Especialidad::destroy($id);
        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/especialidades')->with('mensaje', 'Permiso Eliminado');
    }
}
