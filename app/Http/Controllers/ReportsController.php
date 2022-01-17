<?php

namespace App\Http\Controllers;

use App\Exports\ComplaintExport;
use App\Exports\CustomerExport;
use App\Exports\TechnicianExport;
use App\Exports\ProcessedComplaintExport;
use App\Exports\RepairementExport;
use App\Exports\UnprocessedComplaintExport;
use App\Models\Complaints;
use App\Models\Customers;
use App\Models\Repairements;
use App\Models\RepairResult;
use App\Models\Technicians;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    public function index()
    {
        $customers = Customers::all();
        $technicians = Technicians::all();
        $complaints = Complaints::all()->sortBy('status');
        $unprocessedComplaints = Complaints::where('status', 'unprocessed')->get();
        $processedComplaints = Complaints::where('status', 'processed')->get();
        $repairement = Repairements::all();
        $repairementResult = RepairResult::all();

        return view('pages.reports.index', compact([
            'customers', 'technicians', 'complaints', 'unprocessedComplaints', 'processedComplaints', 'repairement', 'repairementResult'
        ]));

        // return date('d-m-Y:H:i:s');
    }

    public function customerExport()
    {
        return Excel::download(
            new CustomerExport, 
            'customers-' . date('d-m-Y:H:i:s') . '.xlsx'
        );
    }

    public function technicianExport()
    {
        return Excel::download(
            new TechnicianExport, 
            'technicians-' . date('d-m-Y:H:i:s') . '.xlsx'
        );
    }

    public function complaintExport()
    {
        return Excel::download(
            new ComplaintExport, 
            'complaints-' . date('d-m-Y:H:i:s') . '.xlsx'
        );
    }

    public function unprocessedComplaintExport()
    {
        return Excel::download(
            new UnprocessedComplaintExport, 
            'complaints-unprocessed-' . date('d-m-Y:H:i:s') . '.xlsx'
        );
    }

    public function processedComplaintExport()
    {
        return Excel::download(
            new ProcessedComplaintExport,
            'complaints-processed-' . date('d-m-Y:H:i:s') . '.xlsx'
        );
    }

    public function repairementsExport()
    {
        return Excel::download(
            new RepairementExport,
            'repairements-' . date('d-m-Y:H:i:s') . '.xlsx'
        );
    }
}
