<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nip',
        'nama',
        'email',
        'password',
        'jk',
        'no_telp'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pasien(): HasMany
    {
        return $this->hasMany(Pasien::class, 'user_id');
    }

    public function pasienBulanIni(): HasMany
    {
        return $this->hasMany(Pasien::class, 'user_id')
            ->where('created_at', '>=', Carbon::today()->startOfMonth())
            ->where('created_at', '<=', Carbon::today()->endOfMonth());
    }

    public function evaluasi(): HasOne
    {
        return $this->hasOne(Evaluasi::class, 'user_id')
            ->where('created_at', '>=', Carbon::today()->startOfMonth())
            ->where('created_at', '<=', Carbon::today()->endOfMonth());
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class, 'user_id')
            ->where('date', '>=', Carbon::today()->startOfMonth())
            ->where('date', '<=', Carbon::today()->endOfMonth());
    }

    public function absensiHariIni(): HasOne
    {
        return $this->hasOne(Absensi::class, 'user_id')
            ->where('date', now()->format('Y-m-d'));
    }

    public function cekAbsensi($tanggal): ?Absensi
    {
        $date = Carbon::parse($tanggal . '-' . now()->month . '-' . now()->year);

        return $this->absensi->where('date', $date->format('Y-m-d'))->first();
    }
}
