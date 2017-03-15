<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicina extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    public function scopeNombre($query, $nombre)
    {
        return $query->where('nombre', 'like', '%'.$nombre.'%');
    }

    public function recipe()
    {
        return $this->belongsToMany('App\Recipe');
    }
}
