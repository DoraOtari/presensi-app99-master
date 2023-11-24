<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('foto_presensi_masuk')->nullable();
            $table->string('foto_presensi_keluar')->nullable();
            $table->integer('tgl');
            $table->integer('bln');
            $table->integer('thn');
            $table->string('waktu_presensi_masuk')->nullable();
            $table->string('waktu_presensi_keluar')->nullable();
            $table->string('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kehadiran');
    }
};
