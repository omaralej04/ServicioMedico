<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patologia extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

}
