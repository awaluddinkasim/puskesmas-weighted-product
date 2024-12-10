<?php

namespace App\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class TableAbsensi extends Component
{
    public $users;

    public $month;

    public function mount()
    {
        $this->month = Carbon::now()->month;
    }

    public function render()
    {
        $dates = [];
        $start = Carbon::create(Carbon::now()->year, $this->month)->startOfMonth();
        $current = $start;
        $end = Carbon::create(Carbon::now()->year, $this->month)->endOfMonth();

        while ($current->lte($end)) {
            if ($current->dayName != 'Minggu') {
                $dates[] = $current->format('d');
            }
            $current = $current->addDay();
        }

        return view('livewire.table-absensi', [
            'dates' => $dates,
        ]);
    }
}
