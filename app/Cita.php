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

    public function userpaciente(){
        return $this->belongsTo('App\User', 'paciente_id');
    }

    public function especialidad(){
        return $this->hasOne('App\Especialidad', 'especialidad_id');
    }

    public function usermedico(){
        return $this->belongsTo('App\User', 'medico_id');
    }
}
