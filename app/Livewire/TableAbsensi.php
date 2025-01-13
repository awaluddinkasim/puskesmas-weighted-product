<?php

namespace App\Livewire;

use App\Models\Absensi;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class TableAbsensi extends Component
{
    public $users;

    public $month;

    public $year;

    public function mount()
    {
        $this->month = Carbon::now()->month;
        $this->year = date('Y');
    }

    public function render()
    {
        $dates = [];

        $start = Carbon::create($this->year, $this->month)->startOfMonth();
        $current = $start;
        $end = Carbon::create($this->year, $this->month)->endOfMonth();

        while ($current->lte($end)) {
            if ($current->dayName != 'Minggu') {
                $dates[] = $current->format('Y-m-d');
            }
            $current = $current->addDay();
        }

        return view('livewire.table-absensi', [
            'dates' => $dates,
            'years' => Absensi::select('date')->distinct()->get()->pluck('year')->unique(),
        ]);
    }
}
