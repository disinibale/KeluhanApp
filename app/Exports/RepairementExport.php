<?php

namespace App\Exports;

use App\Models\RepairResult;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class RepairementExport implements FromView
{
    public function view(): View
    {
        return view('pages.reports.repairements', [
            'results' => RepairResult::all()
        ]);
    }
}
