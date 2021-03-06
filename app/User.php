<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Especialidad;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'cedula', 'fecha_nacimiento', 'sexo', 'direccion', 'email', 'telefono', 'celular',
        'password', 'especialidad_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function especialidad() {
        return $this->belongsTo('App\Especialidad');
    }

    public function cita() {
        return $this->hasMany('App\Cita');
    }

    public function historial(){
        return $this->hasMany('App\Historial');
    }

    public function scopeCedula($query, $cedula)
    {
        return $query->where('cedula', 'like', '%'.$cedula.'%');
    }
}

