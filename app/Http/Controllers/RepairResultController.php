<?php

namespace App\Http\Controllers;

use App\Models\Complaints;
use App\Models\RepairResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairResultController extends Controller
{
    public function store(Request $request, $id)
    {

        $complaint = Complaints::findOrFail($id);
        if($complaint->update(['status' => 'completed'])) {

            $request->validate([
                'finish_date' => 'required',
                'results' => 'required|max:200'
            ]);

            RepairResult::create([
                'repairements_id' => $complaint->repairement->id,
                'finish_date' => $request->finish_date,
                'result' => $request->results
            ]);

        }
        
        return redirect()->route('complaint.processed')->with('success', 'Keluhan pelanggan telah diselesaikan, Informasi telah disimpan pada Data Perbaikan');
        // return $id;
    }

    public function index()
    {
        $result = Complaints::where([
            ['user_id', '=', Auth::id()],
            ['status', '=', 'completed']
        ])->paginate(10);

        return view('user.repairements.index', compact('result'));
    }
}
