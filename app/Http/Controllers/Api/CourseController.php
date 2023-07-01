<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $courses = CourseResource::collection(Course::all());
        return $this->apiresponse($courses, 200, 'ok');
    }

    public function show($id)
    {
        $courses = Course::find($id);
        if ($courses) {
            return $this->apiresponse(new CourseResource($courses));
        }
        return $this->apiresponse($courses, 401, 'not found');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required',
            'hours' => 'required',
            'category_id' => 'required',
            'vendor_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $courses = Course::create($request->all());

        if ($courses) {
            return $this->apiresponse(new CourseResource($courses));
        } else {
            return $this->apiresponse($courses, 400, 'not saved');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required',
            'hours' => 'required',
            'category_id' => 'required',
            'vendor_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $courses = Course::find($id);

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
        $courses = Course::find($id);

        if (!$courses) {
            return $this->apiresponse($courses, 400, 'not found');
        }

        $courses->delete($id);

        if ($courses) {
            return $this->apiresponse($courses);
        }
    }
}
