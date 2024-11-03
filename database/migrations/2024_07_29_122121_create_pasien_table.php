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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('no_rekam_medis');
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('tgl_lahir');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->string('status_nikah');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('keluhan');
            $table->string('riwayat_penyakit');
            $table->string('riwayat_alergi');
            $table->string('riwayat_obat');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
