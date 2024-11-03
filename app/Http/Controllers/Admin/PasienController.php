<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PasienController extends BaseController
{
    public function index(): View
    {
        return view('pages.admin.pasien.index', [
            'daftarPasien' => Pasien::all(),
        ]);
    }


    public function show(Pasien $pasien): View
    {
        return view('pages.admin.pasien.show', [
            'pasien' => $pasien,
        ]);
    }


    public function create(): View
    {
        return view('pages.admin.pasien.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'no_rekam_medis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'tgl_lahir' => 'required|date',
            'jk' => 'required',
            'status_nikah' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'keluhan' => 'required',
            'riwayat_penyakit' => 'required',
            'riwayat_alergi' => 'required',
            'riwayat_obat' => 'required',
            'riwayat_medis' => 'required',
            'riwayat_kesehatan' => 'required',
        ]);

        Pasien::create($data);

        return $this->redirect(route('admin.pasien.list'), [
            'status' => 'success',
            'message' => 'Pasien baru ditambahkan',
        ]);
    }

    public function penanganan(): View
    {
        return view('pages.admin.pasien.perawat', [
            'daftarPasien' => Pasien::all(),
        ]);
    }
}
