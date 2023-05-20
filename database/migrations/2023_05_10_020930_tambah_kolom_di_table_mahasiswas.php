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
        //
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->string('Email', 100)->after('No_Handphone')->nullable()->unique();
            $table->date('Tanggal_lahir')->after('Email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropColumn('Email');
            $table->dropColumn('Tanggal_lahir');
        });
    }
};
