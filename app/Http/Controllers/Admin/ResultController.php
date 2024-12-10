<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Result;
use App\Models\Evaluasi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class ResultController extends Controller
{
    public function index(): View
    {
        return view('pages.admin.ranking.index', [
            'results' => Result::where('created_at', '>=', Carbon::today()->startOfMonth())
                ->where('created_at', '<=', Carbon::today()->endOfMonth())
                ->get()->sortByDesc('vectorV'),
        ]);
    }

    public function export()
    {
        $pdf = Pdf::loadView('exports.pdf', [
            'results' => Result::where('created_at', '>=', Carbon::today()->startOfMonth())
                ->where('created_at', '<=', Carbon::today()->endOfMonth())
                ->get()->sortByDesc('vectorV'),
        ]);

        return $pdf->stream('hasil-' . time() . '.pdf');
    }
}
