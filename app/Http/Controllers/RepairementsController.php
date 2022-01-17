<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use Illuminate\Http\Request;
use App\Models\Repairements;
use App\Models\RepairResult;

class RepairementsController extends Controller
{
    public function index()
    {
        $repairements = RepairResult::paginate(10);

        return view('pages.repairments.index', compact('repairements'));
        // $repairement = Repairements::find(1);

        // return $repairement->result;
    }

    public function show($id)
    {
        
    }

    public function store(Request $request, $id)
    {
        
        $complaint = Complaints::findOrFail($id);
        if($complaint->update(['status' => 'processed'])) {
            
            $request->validate([
                'technician' => 'required',
                'date' => 'required',
                'action' => 'required|max:200'
            ]);

            Repairements::create([
                'complaints_id' => $id,
                'technicians_id' => $request->technician,
                'date' => $request->date,
                'actions' => $request->action
            ]);
        
        }


        return redirect()->route('complaint.processed')->with('success', 'Data keluhan telah diproses');
    }

    public function update($id, Request $request)
    {
        
    }

    public function destroy()
    {
        
    }
}
