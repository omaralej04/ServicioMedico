<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Historial extends Model
{
    use Notifiable;

    protected $fillable = [
        'paciente_id', 'especialidad_id', 'medico_id', 'cita_id', 'informe', 'receta', 'observaciones'
    ];


    public function userpaciente(){
        return $this->belongsTo('App\User', 'paciente_id');
    }

    public function especialidad(){
        return $this->belongsTo('App\Especialidad', 'especialidad_id');
    }

    public function usermedico(){
        return $this->belongsTo('App\User', 'medico_id');
    }

    public function cita(){
        return $this->belongsTo('App\Cita', 'cita_id');
    }

    public function recipe()
    {
        return $this->hasOne('App\Recipe', 'consulta_id', 'id');
    }

}
