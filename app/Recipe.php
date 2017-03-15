<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Recipe extends Model
{
    use Notifiable;

    protected $fillable = [
        'consulta_id', 'status', 'medicina', 'descripcion'
    ];

    public function historia(){
        return $this->belongsTo('App\Historial', 'consulta_id');
    }
}
