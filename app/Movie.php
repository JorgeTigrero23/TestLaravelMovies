<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    
    public function authorize()
    {
        return true;
    }

    protected $fillable = [
        'name',
        'description',
        'genre',
        'year',
        'duration'
    ];

}
