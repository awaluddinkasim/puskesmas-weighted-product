<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AbsensiController extends Controller
{
    public function index(): View
    {
        $dates = [];
        $now = Carbon::now()->startOfMonth();
        while ($now->lte(Carbon::now()->endOfMonth())) {
            if ($now->dayName != 'Minggu') {
                $dates[] = $now->format('d');
            }
            $now = $now->addDay();
        }

        return view('pages.admin.absensi.index', [
            'dates' => $dates,
            'users' => User::all(),
        ]);
    }
}
