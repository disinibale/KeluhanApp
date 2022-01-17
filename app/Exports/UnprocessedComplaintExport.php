<?php

namespace App\Exports;

use App\Models\Complaints;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class UnprocessedComplaintExport implements FromView
{
    public function view(): View
    {
        return view('pages.reports.complaint', [
            'complaints' => Complaints::where('status', 'unprocessed')->get()
        ]);
    }
}
