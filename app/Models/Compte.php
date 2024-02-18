<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Compte extends Authenticatable implements JWTSubject
{
    use HasFactory;

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    protected $primaryKey = 'id_compte'; // Indiquez la clé primaire si elle est différente de 'id'

    protected $fillable = ['password', 'login', 'type']; 
    protected $hidden = [
        'password',
    ];

    public function getAuthPassword() //retourne la valeur du champ 'mot_de_passe' 
                                    //lorsque Laravel tente de récupérer le mot de passe pour l'authentification.
    {
        return $this->password;
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id_compte');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'id_compte');
    }
}
