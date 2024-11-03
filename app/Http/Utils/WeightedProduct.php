<?php

namespace App\Http\Utils;

use App\Models\User;
use Carbon\Carbon;

class WeightedProduct
{
    private $bobot = [
        'kehadiran' => 0.20,
        'penanganan_pasien' => 0.15,
        'komunikasi' => 0.15,
        'sikap' => 0.15,
        'kinerja' => 0.20,
        'keterampilan_teknis' => 0.15,
    ];

    public function hitungKehadiran($kehadiran)
    {
        $startDate = Carbon::parse(now())->startOfMonth();
        $endDate = Carbon::parse(now())->endOfMonth();

        $totalHari = $startDate->diffInDays($endDate) + 1;

        $hadir = $kehadiran->whereIn('status', ['Hadir', 'Terlambat'])->count();
        $terlambat = $kehadiran->where('status', 'Terlambat')->count();

        $persentaseKehadiran = ($hadir / $totalHari) * 100;
        $persentaseTerlambat = $hadir > 0 ? ($terlambat / $hadir) * 100 : 0;

        if ($persentaseKehadiran >= 95) $score = 5;
        elseif ($persentaseKehadiran >= 90) $score = 4;
        elseif ($persentaseKehadiran >= 85) $score = 3;
        elseif ($persentaseKehadiran >= 80) $score = 2;
        else $score = 1;

        if ($persentaseTerlambat > 20) $score -= 2;
        elseif ($persentaseTerlambat > 10) $score -= 1;

        return $score;
    }

    public function hitungPenangananPasien($jumlah)
    {
        $max = User::all()->max('pasien_bulan_ini');

        if ($max == 0) {
            return 1;
        }

        $score = ($jumlah / $max) * 5;

        return $score;
    }

    public function hitungHasil($scores)
    {
        $vectorS = 1;
        foreach ($scores as $kriteria => $score) {
            $vectorS *= pow($score, $this->bobot[$kriteria]);
        }

        return $vectorS;
    }
}
