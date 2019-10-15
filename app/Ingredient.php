<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * The roles that belong to the user.
     */
    public function recipes()
    {
        return $this->belongsToMany('App\Recipe');
    }
}
