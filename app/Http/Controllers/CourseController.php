<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Vendor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $vendors = Vendor::all();
        return view('courses.create', compact('vendors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'hours' => 'required|max:1',
            'category_id' => 'required',
            'vendor_id' => 'required',
        ]);
        Course::create($request->except('_token'));
        return redirect()->route('course.index')->with('message', 'Course Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $vendors = Vendor::all();
        $courses = Course::find($id);
        return view('courses.edit', compact('courses', 'categories', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Course::find($id)->update($request->except('_token'));
        return redirect()->route('course.index')->with('message', 'Course Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect()->route('course.index')->with('message', 'Course Deleted');
    }
}
