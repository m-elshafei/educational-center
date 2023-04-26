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
        $request->validate(['name' => 'required', 'company_id' => 'required']);
        Maneger::create($request->except('_token'));

        return redirect()->route('manager.index')->with('message', 'Manager Added');
        // return redirect()->route('branch.index')->with('message', 'Branch Added');

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
        $companies = Company::all();
        $managers = Maneger::find($id);
        return view('maneger.edit', compact('managers', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'require',
            'company_id' => 'require'
        ]);
        $manager = Maneger::find($id)->update($request->except('_token'));
        return redirect()->route('manager.index')->with('message', 'Manager Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Maneger::destroy($id);
        return redirect()->route('manager.index')->with('message', 'Manager Deleted');
    }
}
