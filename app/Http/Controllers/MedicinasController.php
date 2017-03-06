<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicina;
use Illuminate\Support\Facades\Auth;
use Validator;

class MedicinasController extends Controller
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
        if(!Auth::user()->can('ReadMedicinas'))
            abort(403,'Acceso Prohibido');

        $medicinas = Medicina::paginate();
        return view('medicinas.index', ['medicinas' => $medicinas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->can('CreateMedicinas'))
            abort(403,'Acceso Prohibido');

        return view('medicinas.create');
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
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $medicina = Medicina::create([
                'nombre' => $request->input('nombre')
            ]);
        }catch (\Exception $e) {
            \DB::rollback();
        }finally {
            \DB::commit();
        }

        return redirect('/medicinas')->with('mensaje', 'Medicina Creada');
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
        if(!Auth::user()->can('UpdateMedicinas'))
            abort(403,'Acceso Prohibido');

        $medicina = Medicina::findOrFail($id);
        return view('medicinas.edit', ['medicina'=>$medicina]);
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
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::beginTransaction();
            $medicina = Medicina::findOrFail($id);

            $medicina->update([
                'nombre' => $request->input('nombre'),
            ]);
        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/medicinas')->with('mensaje', 'Medicina Editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->can('DeleteMedicinas'))
            abort(403,'Acceso Prohibido');

        Medicina::destroy($id);
        return redirect('/medicinas')->with('mensaje', 'Medicina Eliminada');
    }
}
