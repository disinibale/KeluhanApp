<?php

namespace App\Http\Controllers;

use App\Models\Technicians;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TechniciansController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $technicians = Technicians::paginate(10);

        return view('pages.technicians.index', compact('technicians'));
    }

    public function show($id)
    {
        $technicians = Technicians::where('id', $id)->first();

        return view('pages.technicians.show', compact('technicians'));
    }

    public function create()
    {
        return view('pages.technicians.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|unique:technicians,email',
            'phone' => 'required|max:14',
            'address' => 'required|max:200'
        ]);

        $technicians = Technicians::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('technicians.index')->with('success', 'Data Teknisi Telah Dibuat');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|unique:technicians,email',
            'phone' => 'required|max:14',
            'address' => 'required|max:200'
        ]);

        $teknisi = Technicians::findOrFail($id);
        $teknisi->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('technicians.index')->with('success', 'Data Teknisi Telah Diubah');
    }

    public function destroy($id)
    {
        $technicians = Technicians::findOrFail($id);
        $technicians->delete();

        return redirect()->route('technicians.index')->with('success', 'Data Teknisi Telah Dihapus');
    }
}
