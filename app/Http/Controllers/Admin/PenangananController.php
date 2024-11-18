<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Penanganan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PenangananController extends BaseController
{
    public function index(): View
    {
        return view('pages.admin.penanganan.index', [
            'daftarPasien' => Pasien::where('user_id', '!=', null)->get(),
        ]);
    }

    public function show(Pasien $pasien): View
    {
        return view('pages.admin.penanganan.show', [
            'pasien' => $pasien->load('penanganan'),
        ]);
    }
}
