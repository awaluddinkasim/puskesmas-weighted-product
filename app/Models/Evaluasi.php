<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasi';

    protected $fillable = [
        'user_id',
        'kehadiran',
        'penanganan_pasien',
        'komunikasi',
        'sikap',
        'kinerja',
        'keterampilan_teknis',
        'bobot',
    ];

    public function perawat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
