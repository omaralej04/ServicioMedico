<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Recipe extends Model
{
    use Notifiable;

    protected $fillable = [
        'consulta_id', 'farmaceuta_id', 'status', 'descripcion'
    ];

    public function historia()
    {
        return $this->belongsToMany('App\Historial');
    }

    public function medicina()
    {
        return $this->belongsToMany('App\Medicina', 'recipe_medicinas', 'recipe_id');
    }
}
