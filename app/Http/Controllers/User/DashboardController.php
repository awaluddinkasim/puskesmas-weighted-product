<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('pages.user.dashboard', [
            'pasien' => auth('user')->user()->pasien->count(),
            'pasienBulanIni' => auth('user')->user()->pasienBulanIni->count(),
            'totalKehadiran'=> auth('user')->user()->absensi->count(),
            'statusAbsen'=> auth('user')->user()->absensiHariIni ? 'Sudah' : 'Belum',
        ]);
    }
}
