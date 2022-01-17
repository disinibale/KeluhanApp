<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\User;

class CustomersController extends Controller
{

    public function index()
    {
        $customers = Customers::paginate(10);

        return view('pages.customers.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = Customers::where('id', $id)->first();

        return view('pages.customers.show', compact('customer'));
    }
    
    public function edit($id)
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'phone' => 'required|max:14',
            'address' => 'required'
        ]);

        Customers::create([
            'user_id' => $request->user_id,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('user.complaints.index')->with('success', 'Informasi anda telah disimpan');
    }

    public function update($id, Request $request)
    {
        $customer = Customers::findOrFail($id);

        $request->validate([
            'address' => 'required|max:200',
            'phone' => 'required|max:14'
        ]);

        $customer->update([
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        return redirect()->route('customer.index')->with('success', 'Data telah diperbarui');
    }

    public function destroy($id)
    {
        $customer = Customers::findOrFail($id);
        
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Data pelanggan telah dihapus');
    }

}
