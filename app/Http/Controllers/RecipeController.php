<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->has('category')) {

            $recipes = Recipe::where(function($recipe){
                $recipe->where('category', request('category'));
            })->paginate(10)->appends('category', request('category'));
    
         }
         else {
            $recipes = Recipe::all();
            }
    
            return view('recipes.index', compact('recipes'));
        }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create', [
            'recipe' => new Recipe
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = request()->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        Recipe::create([
            'name'    => $data['name'],
            'category' => $data['category'],
            'description' => $data['description'],
            'user_id' => auth()->id()
        ]);

        return redirect()->action('RecipeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', [
            'recipe' => Recipe::find($recipe->id)
        ]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Recipe  $recipe
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Recipe $recipe)
    // {
    //     return view('recipes.edit', [
    //         'recipe' => Recipe::find($recipe->id)
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Recipe  $recipe
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $recipe = Recipe::find($id);
    //     $recipe->name = $request->input('name');
    //     $recipe->description = $request->input('description');
    //     $recipe->save();

    //     return redirect()->action('RecipeController@index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Recipe  $recipe
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $recipe = Recipe::find($id);
    //     $recipe->delete();

    //     return redirect()->action('RecipeController@index');
    // }
}
