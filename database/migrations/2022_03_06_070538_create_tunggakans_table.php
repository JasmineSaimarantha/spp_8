<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTunggakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunggakans', function (Blueprint $table) {
            $table->bigIncrements('id_tunggakan');
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_kelas');
            $table->string('bulan_spp');
            $table->string('tahun_spp');
            $table->enum('status', ['belum lunas', 'lunas'])->default('belum lunas');

            $table->foreign('id_siswa')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tunggakan');
    }
}
