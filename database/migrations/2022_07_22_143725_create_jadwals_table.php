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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('hari');

            $table->unsignedBigInteger('matakuliah_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('ruangan_id');
            $table->unsignedBigInteger('prodi_id');
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();

            $table->foreign('matakuliah_id')->references('id')->on('matakuliahs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dosen_id')->references('user_id')->on('dosens')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('prodi_id')->references('id')->on('prodis')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('jadwals');
    }
};
