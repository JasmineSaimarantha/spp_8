<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nisn')->nullable();
            $table->string('nis')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->unsignedBigInteger('id_spp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('email');
            $table->string('password');
            $table->enum('role', ['admin', 'petugas', 'siswa']);
            $table->rememberToken();

            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
            $table->foreign('id_spp')->references('id_spp')->on('spp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
