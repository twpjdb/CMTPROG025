<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Support\Facades\Request;

class SearchController extends Controller
{
    public function search() 
    {
        $search = Request::get('search'); 
        
        $recipe = Recipe::where(function($recipe){
            $search = Request::get('search');
            $recipe->where('name', 'LIKE', '%'.$search.'%')->orWhere('category', 'LIKE', '%'.$search.'%');
        })->get();

        if(count($recipe) > 0)
        return view('recipes.search')->withDetails($recipe)->withQuery($search);

        else return view ('recipes.search', [
            'errorMessage' => 'Jammer man ik heb niks gevonden, probeer het nog eens xDDD',
        ]);
    }
}
