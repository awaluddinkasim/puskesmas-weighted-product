<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Evaluasi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.ranking.index', [
            'hasil' => Evaluasi::orderBy('bobot', 'desc')
                ->where('created_at', '>=', Carbon::today()->startOfMonth())
                ->where('created_at', '<=', Carbon::today()->endOfMonth())
                ->get(),
        ]);
    }
}
