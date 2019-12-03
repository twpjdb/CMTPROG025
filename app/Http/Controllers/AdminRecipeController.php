<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class AdminRecipeController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct() 
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.recipes', [
            'recipes' => Recipe::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createRecipe', [
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
            'description'    => $data['description'],
            'user_id' => auth()->id()
        ]);

        return redirect('/admin/recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('admin.showRecipe', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('admin.editRecipe', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Recipe $recipe)
    {
        $data = request()->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $recipe->update([
            'name' => $data['name'],
            'category' => $data['category'],
            'description' => $data['description']
        ]);

        return redirect('/admin/recipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        
        $recipe->delete();

        return redirect('/admin/recipes');
    }
}
