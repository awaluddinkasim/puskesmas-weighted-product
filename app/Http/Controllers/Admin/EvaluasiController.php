<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Evaluasi;
use Illuminate\Http\Request;
use App\Http\Utils\WeightedProduct;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;

class EvaluasiController extends BaseController
{

    public function index(): View
    {
        return view('pages.admin.evaluasi.index', [
            'users' => User::all(),
        ]);
    }

    public function evaluasi(User $user): View
    {
        return view('pages.admin.evaluasi.user', [
            'user' => $user,
        ]);
    }

    public function store(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'komunikasi' => 'required',
            'sikap' => 'required',
            'kinerja' => 'required',
            'keterampilan_teknis' => 'required',
        ]);

        $evaluasi = Evaluasi::where('user_id', $user->id)
            ->where('created_at', '>=', Carbon::today()->startOfMonth())
            ->where('created_at', '<=', Carbon::today()->endOfMonth())
            ->first();

        if ($evaluasi > 0) {
            $evaluasi->delete();
        }

        $wp = new WeightedProduct();

        $data['kehadiran'] = $wp->hitungKehadiran($user->absensi);
        $data['penanganan_pasien'] = $wp->hitungPenangananPasien($user->pasien_bulan_ini);

        $data['bobot'] = $wp->hitungHasil($data);

        $data['user_id'] = $user->id;

        // dd($data);

        Evaluasi::create($data);

        return $this->redirect(route('admin.evaluasi'), [
            'status' => 'success',
            'message' => 'Berhasil',
        ]);
    }
}
