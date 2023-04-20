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
    public function index()
    {
        // $now = new carbon('first day of mar',- ,carbo::now());
        // $now = Carbon::now()->toArray();
        // $now = Carbon::now()->addYear(5)->toArray();
        // $now = Carbon::now()->addMonth(5)->toArray();
        // $now = Carbon::now()->toDateTimeString();
        // $now = now()->timestamp;
        // $now = Carbon::parse($now)->format('D, d M \'y, H:i');
        // $now = Time::now()->timestamp;
        // date_default_timezone_set('Australia/Melbourne');
        // $now = date("Y-m-d H:i:s", time());
        // dd($now);
        // $startDate = Carbon::parse("2011-10-28");
        // $endDate = Carbon::parse("2022-11-21");
        // $diffInDays = $startDate->diffInyears($endDate);
        // $date = "2016-09-16 11:00:00";
        // $datework = Carbon::createFromDate($date);
        // $now = Carbon::now();
        // $testdate = $datework->diffInyears($now);
        // dd($testdate);
        $companies = Company::paginate(8);
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
        return redirect()->route('company.index');
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
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}