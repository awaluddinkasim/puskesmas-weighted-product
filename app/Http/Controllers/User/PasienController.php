<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PasienController extends Controller
{

    public function index(): View
    {
        return view('pages.user.pasien.index', [
            'daftarPasien' => auth('user')->user()->pasien,
            'pasienTersedia' => Pasien::doesntHave('perawat')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien' => 'required',
        ]);

        $pasien = Pasien::find($request->pasien);
        $pasien->user_id = auth('user')->user()->id;
        $pasien->update();

        return redirect()->back()->with('success', 'Pasien ditambahkan');
    }

    public function show(Pasien $pasien): View
    {
        return view('pages.user.pasien.show', [
            'pasien' => $pasien,
        ]);
    }
}
