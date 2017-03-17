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
        $medicinas = \DB::table('recipe_medicinas')->where('recipe_id', '=', $historia->recipe[0]->id)->paginate(3);

        return view('recipes.view', ['historia'=>$historia, 'medicinas'=>$medicinas]);
    }

    public function index()
   {
       $recipes = Recipe::where('status', '=', 'pendiente')->paginate(12);
       return view('recipes.index', ['recipes'=>$recipes]);
   }

   public function indexinac()
   {
       $recipes = Recipe::where('status', '=', 'entregado')->paginate(12);
       return view('recipes.indexinac', ['recipes'=>$recipes]);
   }

    public function updateStatus($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->update([
            'status' => 'entregado'
        ]);

        return redirect('/recipes/all')->with('mensaje', 'recipe editado...');
    }

    public function updateStatusT($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->update([
            'status' => 'pendiente'
        ]);

        return redirect('/recipes/all')->with('mensaje', 'recipe editado...');
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
