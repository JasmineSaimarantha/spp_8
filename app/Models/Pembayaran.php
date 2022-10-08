<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    //use HasFactory
    protected $table = 'pembayaran';
    protected $primaryKey ='id_pembayaran';
    protected $fillable = [
        'id_petugas', 'tgl_bayar', 'bulan_spp', 'tahun_spp', 'bayar', 'status', 'nisn'
    ];
    public $timestamps = false;

    public function users(){
        return $this->belongsto(User::class, 'id_petugas', 'id');
    }

    public function siswa(){
        return $this->belongsto(Siswa::class, 'id_siswa', 'id_siswa');
    }
}
