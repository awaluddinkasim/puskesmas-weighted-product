<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Pasien;
use App\Models\User;

class DashboardController extends BaseController
{
    public function index(): View
    {
        return view('pages.admin.dashboard', [
            'perawat' => User::count(),
            'perawatBelumDievaluasi' => User::doesntHave('evaluasi')->count(),
            'pasien' => Pasien::count(),
        ]);
    }
}
