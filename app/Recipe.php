<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }
}
