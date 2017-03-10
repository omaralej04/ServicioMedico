<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Especialidad extends Model
{
    use Notifiable;

    protected $fillable = [
        'nombre',
    ];

    public function user(){
        return $this->hasMany('App\User');
    }

    public function cita() {
        return $this->hasMany('App\Cita');
    }
}
