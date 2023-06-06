<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::orderBy('created_at', 'desc')->paginate(10);
        return view('Vendors.index', compact('vendors',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Vendor::create($request->except('_token'));
        // return redirect()->route('vendor.index')->with('message', 'Vendor Added');
        $request->validate([
            'name' => 'required|string|max:200',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $vendor = new Vendor();
        $vendor->name = $request->name;
        // $vendor->logo = $request->logo;
        // Storage::download($request->logo);
        Storage::disk('public')->put('vendors', $request->logo);
        $vendor->logo = $request->file('logo')->store('vendors');
        $vendor->save();
        return redirect()->route('vendor.index')->with(['message' => 'Vendor Added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vendor = Vendor::find($id);
       return view('vendors.edit',compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
