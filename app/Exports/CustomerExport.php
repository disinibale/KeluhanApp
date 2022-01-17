<?php

namespace App\Exports;

use App\Models\Customers;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class CustomerExport implements FromView
{
    public function view(): View
    {
        return view('pages.reports.customers', [
            'customers' => Customers::all()
        ]);
    }
}
