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
        Schema::create('kriteria_perbandingan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kriteria_baris');
            $table->foreignId('kriteria_kolom');
            $table->string('bobot_baris');
            $table->string('bobot_kolom');
            $table->timestamps();

            $table->foreign('kriteria_baris')->references('id')->on('kriteria')->cascadeOnDelete();
            $table->foreign('kriteria_kolom')->references('id')->on('kriteria')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria_perbandingan');
    }
};
