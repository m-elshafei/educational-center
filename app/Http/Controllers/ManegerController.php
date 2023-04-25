<?php

namespace App\Http\Controllers;

use App\Models\Maneger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;

use function PHPUnit\Framework\directoryExists;

class ManegerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managers = Maneger::paginate(10);
        return view('Maneger.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('maneger.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Maneger $maneger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $managers = Maneger::find($id);
        // $companies = Company::find($id->company_id);
        dd($managers);
        return view('maneger.edit', compact('managers', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maneger $maneger)
    {
        //
    }
}
