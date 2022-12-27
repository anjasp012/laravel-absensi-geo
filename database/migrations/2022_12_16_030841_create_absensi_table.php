<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->date('tanggal');
            $table->string('foto_masuk');
            $table->time('waktu_masuk');
            $table->string('catatan_masuk')->nullable();
            $table->string('keterangan_masuk');
            $table->string('foto_keluar')->nullable();
            $table->time('waktu_keluar')->nullable();
            $table->string('catatan_keluar')->nullable();
            $table->string('keterangan_keluar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
