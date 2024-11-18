<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Pasien;
use App\Models\Penanganan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PenangananController extends BaseController
{
    public function index(): View
    {
        return view('pages.user.penanganan.index', [
            'daftarPasien' => Pasien::where('user_id', auth('user')->user()->id)->get(),
        ]);
    }

    public function show(Pasien $pasien): View
    {
        return view('pages.user.penanganan.show', [
            'pasien' => $pasien->load('penanganan'),
        ]);
    }

    public function store(Request $request, Pasien $pasien): RedirectResponse
    {
        $data = $request->validate([
            'keterangan' => 'required',
            'lampiran' => 'required|image',
        ]);

        $data['pasien_id'] = $pasien->id;

        $lampiran = $request->file('lampiran');
        $filename = time() . '.' . $lampiran->extension();

        $lampiran->move(public_path('lampiran'), $filename);

        $data['lampiran'] = $filename;

        Penanganan::create($data);

        return $this->redirect(route('penanganan.show', $pasien), [
            'status' => 'success',
            'message' => 'Input Penanganan Berhasil',
        ]);
    }
}
