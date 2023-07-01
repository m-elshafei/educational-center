<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $courses = EmployeeResource::collection(Employee::all());
        return $this->apiresponse($courses, 200, 'ok');
    }

    public function show($id)
    {
        $courses = Employee::find($id);
        if ($courses) {
            return $this->apiresponse(new EmployeeResource($courses));
        }
        return $this->apiresponse($courses, 401, 'not found');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_title' => 'required',
            'salary' => 'required',
            'hire_date' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $courses = Employee::create($request->all());

        if ($courses) {
            return $this->apiresponse(new EmployeeResource($courses));
        } else {
            return $this->apiresponse($courses, 400, 'not saved');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'job_title' => 'required',
            'salary' => 'required',
            'hire_date' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $courses = Employee::find($id);

        if (!$courses) {
            return $this->apiresponse($courses, 400, 'not found');
        }

        $courses->update($request->all());

        if ($courses) {
            return $this->apiresponse(new EmployeeResource($courses));
        }
    }

    public function destroy($id)
    {
        $courses = Employee::find($id);

        if (!$courses) {
            return $this->apiresponse($courses, 400, 'not found');
        }

        $courses->delete($id);

        if ($courses) {
            return $this->apiresponse($courses);
        }
    }
}
