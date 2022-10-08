<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tunggakan extends Model
{
    protected $table = 'tunggakans';
    protected $primaryKey = 'id_tunggakan';
    protected $fillable = [
        'id_siswa', 'bulan_spp', 'tahun_spp', 'status'
    ];

    public $timestamps=false;
}
