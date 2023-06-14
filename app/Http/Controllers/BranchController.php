<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use Exception;
use Illuminate\Http\Request;


class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $branches = Branch::paginate(10);
        return view('branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::get();
        return view('branches.create', compact('companies'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'company_id' => 'required'
        ]);
        Branch::create($request->except('_token'));
        return redirect()->route('branch.index')->with('message', __('message.category_added') );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $branches = Company::find($id)->branches()->paginate(25);
        return view('branches.index')->with(compact('branches'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('branches.edit', compact('branch'));
    }

    /**F
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branch = Branch::find($id)->update($request->except('_token'));
        return redirect()->route('branch.index')->with('message', __('message.branch_update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Branch::destroy($id);
            return redirect()->route('branch.index')->with('message', __('message.branch_delete'));
        } catch (Exception $e) {
            return redirect()->route('branch.index')->with('message', $e->getMessage());
        }
    }
}
