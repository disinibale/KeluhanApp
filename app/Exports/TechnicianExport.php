<?php

namespace App\Exports;

use App\Models\Technicians;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class TechnicianExport implements FromView
{
    public function view(): View
    {
        return view('pages.reports.technicians', [
            'technicians' => Technicians::all()
        ]);
    }
}
