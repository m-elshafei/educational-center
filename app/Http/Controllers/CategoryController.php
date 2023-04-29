<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Category::create($request->except('_token'));
        return redirect()->route('category.index')->with('message', 'Category Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $class_room = Category::find($id)->update($request->except('_token'));
        return redirect()->route('category.index')->with('message', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Category::destroy($id);
            // dd(Category::destroy($id));
            return redirect()->route('category.index')->with('message', 'Category Deleted');
        } catch (Exception $e) {
            return redirect()->route('category.index')->with('message_er', 'Cannot Delete This Category');
            // return redirect()->route('classroom.index')->with('message', $e->getMessage());
        }
        // Category::destroy($id);
    }
}
