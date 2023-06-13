<?php

namespace App\Http\Controllers;

use carbon\carbon as Time;
use carbon\carbon;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $companies = Company::paginate(10);
    if ($request->search) {
            // $companies->where('name','like','%'.$request->search.'%');
            $companies->where(function($query) use($request){
                $query->where('name','like','%'.$request->search.'%')
                ->orWhere('owner','like','%'.$request->search.'%');
            });
            // dd($companies->toSql()); // return native sql
        }
        return view('companies.index', compact('companies'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Company::create($request->except('_token'));
        return redirect()->route('company.index')->with('message', 'Company Added ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id)->update($request->except('_token'));
        return redirect()->route('company.index')->with('message', "Company Updated " . $request->name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect()->route('company.index')->with('message', "Company Deleted ");
    }
}
