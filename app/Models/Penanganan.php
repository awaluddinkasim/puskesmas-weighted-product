<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penanganan extends Model
{
    use HasFactory;

    protected $table = 'penanganan';

    protected $fillable = [
        'pasien_id',
        'keterangan',
        'lampiran',
    ];

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
}
