<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Exception;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class_rooms = ClassRoom::paginate(10);
        return view('class_rooms.index', compact('class_rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::get();
        return view('class_rooms.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required',
            'branch_id' => 'required'
        ]);
        ClassRoom::create($request->except('_token'));
        return redirect()->route('classroom.index')->with('message', 'Class Room Added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $class_room = ClassRoom::find($id)->branches()->paginate(25);
        return view('classroom.index')->with(compact('class_room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $branches = Branch::all();
        $class_rooms = ClassRoom::find($id);
        return view('class_rooms.edit', compact('class_rooms', 'branches'));
        // return redirect()->route('classroom.update')->with(compact('class_room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $class_room = ClassRoom::find($id)->update($request->except('_token'));
        return redirect()->route('classroom.index')->with('message', 'Class Room Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            ClassRoom::destroy($id);
            return redirect()->route('classroom.index')->with('message', 'Class Room Deleted');
        } catch (Exception $e) {
            return redirect()->route('classroom.index')->with('message_err', 'Cannot Delete This Class Room');
            // return redirect()->route('classroom.index')->with('message', $e->getMessage());
        }
    }
}
