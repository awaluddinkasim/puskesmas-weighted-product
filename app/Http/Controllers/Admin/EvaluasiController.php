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
use App\Models\Result;

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

        if ($evaluasi) {
            $evaluasi->delete();
        }

        $wp = new WeightedProduct();

        $data['kehadiran'] = $wp->hitungKehadiran($user->absensi);
        $data['penanganan_pasien'] = $wp->hitungPenangananPasien($user->pasienBulanIni->count());

        $data['user_id'] = $user->id;

        $evaluasi = Evaluasi::create($data);

        unset($data['user_id']);

        $evaluasi->result?->delete();

        Result::create([
            'evaluasi_id' => $evaluasi->id,
            'bobot' => $wp->hitungHasil($data),
        ]);

        return $this->redirect(route('admin.evaluasi'), [
            'status' => 'success',
            'message' => 'Berhasil',
        ]);
    }
}
