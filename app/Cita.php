<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class Cita extends Model
{
    use Notifiable;

    protected $fillable = [
        'fecha_cita', 'hora', 'observaciones'
    ];

    public function user(){
        return $this->hasMany('App\User');
    }

    public function especialidad(){
        return $this->hasMany('App\Especialidad');
    }
}
