<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'evaluasi_id',
        'bobot',
    ];

    public function evaluasi(): BelongsTo
    {
        return $this->belongsTo(Evaluasi::class, 'evaluasi_id');
    }
}
