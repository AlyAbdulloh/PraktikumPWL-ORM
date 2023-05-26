<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('mahasiswas_nim');
            $table->unsignedBigInteger('matakuliahs_id');
            $table->integer('nilai');
            $table->foreign('mahasiswas_nim')->references('Nim')->on('mahasiswas');
            $table->foreign('matakuliahs_id')->references('id')->on('matakuliahs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
};
