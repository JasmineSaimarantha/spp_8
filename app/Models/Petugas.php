<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Petugas extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use Notifiable;
    protected $guard = 'user';
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $fillable = [
        'email', 'password', 'nama_petugas', 'role'
    ];
    protected $hidden = [
        'password', 'remember_token'
    ];
    public $timestamps = false;
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
