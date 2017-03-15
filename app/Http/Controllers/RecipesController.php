<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use App\Cita;
use App\Historial;
use App\User;
use App\Medicina;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator;
use Auth;

class RecipesController extends Controller
{
    public function ver_recipe($id)
    {
        $historia = Historial::findOrFail($id);
        $recipes = $historia->recipe();
        return view('recipes.view', ['historia'=>$historia, 'recipes'=>$recipes]);
    }

    public function crearRecipe($id)
    {
        $medicinas = Medicina::all();
        $historia = Historial::findOrFail($id);
        return view('recipes.create', ['historia'=>$historia, 'medicinas'=>$medicinas]);
    }

    public function store(Request $request)
    {
        $medicinas = Medicina::all();

        $v = Validator::make($request->all(), [
           'consulta_id' => 'required',
            'status' => 'required',
            'descripcion' => 'required',
        ]);

        if ($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::beginTransaction();

            $recipe = Recipe::create([
               'consulta_id' => $request->input('consulta_id'),
                'status' => $request->input('status'),
                'descripcion' => $request->input('descripcion'),
            ]);
            $recipe->medicina()->detach(Medicina::all());
            $medicinas = $request->input('specializations');
            foreach ($medicinas as $medicina)
                $recipe->medicina()->attach($medicina);

        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/users')->with('mensaje', 'Recipe Asignado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
