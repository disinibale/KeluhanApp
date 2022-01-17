<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use App\Models\Customers;
use App\Models\Technicians;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


class ComplaintsController extends Controller
{
    public function unprocessed()
    {
        $complaints = Complaints::where('status', 'unprocessed')->paginate(10);

        return view('pages.complaints.unprocessed', compact('complaints'));
    }

    public function processed()
    {
        $complaints = Complaints::where('status', 'processed')->paginate(10);
        // $complaints = Complaints::where('id', '1')->first();
        // $technicians = Technicians::where('id', '3')->first();


        return view('pages.complaints.processed', compact('complaints'));
        // return $complaints->repairement->technician;
        // return $technicians->repairements;
    }

    public function proceed($id)
    {
        $complaint = Complaints::find($id);
        $technicians = Technicians::all();
        
        return view('pages.complaints.proceed', compact('complaint', 'technicians'));
    }
    
    public function createResult($id)
    {
        $complaint = Complaints::find($id);
        
        return view('pages.complaints.create-result', compact('complaint'));
        // return $complaint;
    }

    public function index()
    {
        $complaints = Complaints::where([
            ['status', '=', 'unprocessed'],
            ['user_id', '=', Auth::id()]
        ])->paginate(10);

        $customers = Customers::where('user_id', Auth::id())->first();

        return view('user.complaints.index', compact('complaints', 'customers'));
    }

    public function processedIndex()
    {
        $complaints = Complaints::where([
            ['status', '=', 'processed'],
            ['user_id', '=', Auth::id()]
        ])->paginate(10);
        
        return view('user.complaints.processed', compact('complaints'));
    }

    public function show($id)
    {
        $complaint = Complaints::where('id', $id)->first();

        return view('pages.complaints.show', compact('complaint'));
    }

    public function showComplaint($id)
    {
        $complaint = Complaints::where('id', $id)->first();

        return view('user.complaints.show', compact('complaint'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'message' => 'required' 
        ]);

        Complaints::create([
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        return redirect()->route('user.complaints.index')->with('success', 'Data Keluhan anda telah dikirim, Menunggu untuk diproses oleh Admin');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $complaint = Complaints::findOrFail($id);

        $complaint->update([
            'message' => $request->message
        ]);

        // return $request->all();
        return redirect()->route('user.complaints.index')->with('success', 'Data Keluhan anda telah diubah, Menunggu untuk diproses oleh Admin');
    }

    public function destroy($id)
    {
        $complaint = Complaints::findOrFail($id);
        $complaint->delete();
        
        return redirect()->route('user.complaints.index')->with('success', 'Data keluhan anda telah dihapus'); 
    }
}
