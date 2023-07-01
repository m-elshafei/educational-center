<?php

namespace App\Http\Controllers\Api;

use App\Models\Schedule;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleResource;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $schedule = ScheduleResource::collection(Schedule::all());
        return $this->apiresponse($schedule, 200, 'ok');
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);
        if ($schedule) {
            return $this->apiresponse(new ScheduleResource($schedule));
        }
        return $this->apiresponse($schedule, 401, 'not found');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'course_id' => 'required',
            'class_room_id' => 'required',
            'instructor_id' => 'required',
            'created_by' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $schedule = Schedule::create($request->all());

        if ($schedule) {
            return $this->apiresponse(new ScheduleResource($schedule));
        } else {
            return $this->apiresponse($schedule, 400, 'not saved');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'course_id' => 'required',
            'class_room_id' => 'required',
            'instructor_id' => 'required',
            'created_by' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $schedule = Schedule::find($id);

        if (!$schedule) {
            return $this->apiresponse($schedule, 400, 'not found');
        }

        $schedule->update($request->all());

        if ($schedule) {
            return $this->apiresponse(new ScheduleResource($schedule));
        }
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return $this->apiresponse($schedule, 400, 'not found');
        }

        $schedule->delete($id);

        if ($schedule) {
            return $this->apiresponse($schedule);
        }
    }
}
