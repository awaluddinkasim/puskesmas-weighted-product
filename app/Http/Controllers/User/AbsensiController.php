<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Evaluasi;
use App\Models\Kriteria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AbsensiController extends BaseController
{
    public function index(): View
    {
        return view('pages.user.absensi.index', [
            'absenHariIni' => auth('user')->user()->absensiHariIni
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'img' => 'required',
        ]);

        $now = Carbon::now();

        $image_parts = explode(";base64,", $request->img);

        $img = base64_decode($image_parts[1]);

        $name = time() . '.' . 'png';
        file_put_contents(public_path('kehadiran/' . $name), $img);

        $absensi = new Absensi();
        $absensi->user_id = auth('user')->user()->id;
        $absensi->date = Carbon::today();
        $absensi->time_in = $now;
        $absensi->img = $name;
        if ($now->gt(Carbon::parse('08:00:00'))) {
            $absensi->status = 'Terlambat';
        } else {
            $absensi->status = 'Hadir';
        }
        $absensi->save();

        return $this->redirectBack([
            'status' => 'success',
            'message' => 'Berhasil',
        ]);
    }
}
