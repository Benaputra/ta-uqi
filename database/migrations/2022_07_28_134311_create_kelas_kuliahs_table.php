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
        Schema::create('kelas_kuliahs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('jadwal_id');
            $table->unsignedBigInteger('matakuliah_id');

            $table->foreign('mahasiswa_id')->references('user_id')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jadwal_id')->references('id')->on('jadwals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('matakuliah_id')->references('id')->on('jadwals')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas_kuliahs');
    }
};
