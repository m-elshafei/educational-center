<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Employee;
use App\Models\Schedule;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Auth::user()->id);
        //
        $assa = DB::table('users')->select('name')
            ->join('employees', 'employees.user_id', '=', 'users.id')
            ->join('schedules', 'schedules.instructor_id', '=', 'employees.id')
            ->get();
        // dd($a);
        // $employee = Schedule::where('id',1)->with('instractor')->first();
        // $employees= Employee::paginate(10);
        $schedules = Schedule::paginate(10);
        return view('schedule.index', compact('schedules', 'assa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = Course::all();
        $class = ClassRoom::all();
        $instructor = User::all();
        return view('schedule.create', compact('course', 'class', 'instructor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        //     'start_time' => 'required',
        //     'end_time' => 'required',
        //     'course_id' => 'required',
        //     'class_room_id '  => 'required',
        //     'instructor_id' => 'required'
        // ]);
        // $user_id = Auth::user()->id;
        // Schedule::create([$request->except('_token')]);
        Schedule::create([
            'created_by' => Auth::user()->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'course_id' => $request->course_id,
            'class_room_id' => $request->class_room_id,
            'instructor_id' => $request->instructor_id
        ]);
        // Schedule::create($request->except('_token'));
        return redirect()->route('schedule.index')->with('message', 'Schedule Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
 $course = Course::all();
        $class = ClassRoom::all();
        $instructor = Employee::all();
        $schedule = Schedule::find($id);
        return view('schedule.edit', compact('course', 'class', 'instructor','schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
       dd($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
