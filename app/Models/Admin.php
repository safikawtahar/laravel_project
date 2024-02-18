<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = ['nom_admin'];

    public function compte()
    {
        return $this->belongsTo(Compte::class, 'id_compte');
    }
}
