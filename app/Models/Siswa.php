<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Siswa extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $guard = 'siswa';
    protected $table='siswa';
    protected $primaryKey='id_siswa';
    protected $fillable=[
        'nis', 'nama', 'id_kelas', 'alamat', 'no_telp', 'jk', 'id_spp', 'nisn'
    ];
    public $timestamps=false;
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function spp(){
        return $this->belongsTo(Spp::class, 'id_spp', 'id_spp');
    }
}
