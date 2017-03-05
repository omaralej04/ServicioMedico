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
        'nombre', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
