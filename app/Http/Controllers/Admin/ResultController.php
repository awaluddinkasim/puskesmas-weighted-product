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
    public function index(Request $request): View
    {
        if ($request->has('bulan') && $request->has('tahun')) {
            $bulan = $request->bulan;
            $tahun = $request->tahun;

            $results = Result::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->get()->sortByDesc('vectorV');
        } else {
            $results = Result::where('created_at', '>=', Carbon::today()->startOfMonth())
                ->where('created_at', '<=', Carbon::today()->endOfMonth())
                ->get()->sortByDesc('vectorV');
        }

        return view('pages.admin.ranking.index', [
            'results' => $results,
            'years' => Result::select('created_at')->distinct()->get()->pluck('year')->unique(),
        ]);
    }

    public function export(Request $request)
    {
        if ($request->has('bulan') && $request->has('tahun')) {
            $bulan = $request->bulan;
            $tahun = $request->tahun;

            $results = Result::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->get()->sortByDesc('vectorV');
        } else {
            $results = Result::where('created_at', '>=', Carbon::today()->startOfMonth())
                ->where('created_at', '<=', Carbon::today()->endOfMonth())
                ->get()->sortByDesc('vectorV');
        }

        $pdf = Pdf::loadView('exports.pdf', [
            'results' => $results
        ]);

        return $pdf->stream('hasil-' . time() . '.pdf');
    }
}
