<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    protected $fillable = [
        'no_rekam_medis',
        'nama',
        'alamat',
        'no_hp',
        'tgl_lahir',
        'jk',
        'status_nikah',
        'pekerjaan',
        'pendidikan',
        'keluhan',
        'riwayat_penyakit',
        'riwayat_alergi',
        'riwayat_obat',
    ];

    public function perawat()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function penanganan()
    {
        return $this->hasOne(Penanganan::class, 'pasien_id');
    }

    public function usia(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->tgl_lahir)->age
        );
    }
}
