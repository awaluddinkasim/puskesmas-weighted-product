<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

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

    public function year(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->created_at)->year
        );
    }

    public function vectorV(): Attribute
    {
        return Attribute::make(
            get: function () {
                $totalVectorS = Cache::remember('total_vector_s', 60, function () {
                    return self::all()->sum('bobot');
                });

                return $totalVectorS > 0 ? $this->bobot / $totalVectorS : 0;
            }
        );
    }
}
