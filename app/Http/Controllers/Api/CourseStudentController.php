<?php

namespace App\Http\Controllers\Api;

use App\Models\CourseStudent;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Validator;

class CourseStudentController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $courses = CourseResource::collection(CourseStudent::all());
        return $this->apiresponse($courses, 200, 'ok');
    }

    public function show($id)
    {
        $courses = CourseStudent::find($id);
        if ($courses) {
            return $this->apiresponse(new CourseResource($courses));
        }
        return $this->apiresponse($courses, 401, 'not found');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'schedule_id' => 'required',
            'student_id' => 'required',
            'created_by' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $courses = CourseStudent::create($request->all());

        if ($courses) {
            return $this->apiresponse(new CourseResource($courses));
        } else {
            return $this->apiresponse($courses, 400, 'not saved');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'schedule_id' => 'required',
            'student_id' => 'required',
            'created_by' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $courses = CourseStudent::find($id);

        if (!$courses) {
            return $this->apiresponse($courses, 400, 'not found');
        }

        $courses->update($request->all());

        if ($courses) {
            return $this->apiresponse(new CourseResource($courses));
        }
    }

    public function destroy($id)
    {
        $courses = CourseStudent::find($id);

        if (!$courses) {
            return $this->apiresponse($courses, 400, 'not found');
        }

        $courses->delete($id);

        if ($courses) {
            return $this->apiresponse($courses);
        }
    }
}
