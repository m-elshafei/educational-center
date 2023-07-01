<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use App\Models\ClassRoom;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClassRoomResource;
use Illuminate\Support\Facades\Validator;

class ClassRoomController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $classRooms = ClassRoomResource::collection(ClassRoom::all());
        return $this->apiresponse($classRooms, 200, 'ok');
    }

    public function show($id)
    {
        $classRooms = ClassRoom::find($id);
        if ($classRooms) {
            return $this->apiresponse(new ClassRoomResource($classRooms));
        }
        return $this->apiresponse($classRooms, 401, 'not found');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'logo' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $classRooms = ClassRoom::create($request->all());

        if ($classRooms) {
            return $this->apiresponse(new ClassRoomResource($classRooms));
        } else {
            return $this->apiresponse($classRooms, 400, 'not saved');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'logo' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $classRooms = ClassRoom::find($id);

        if (!$classRooms) {
            return $this->apiresponse($classRooms, 400, 'not found');
        }

        $classRooms->update($request->all());

        if ($classRooms) {
            return $this->apiresponse(new ClassRoomResource($classRooms));
        }
    }

    public function destroy($id)
    {
        $classRooms = ClassRoom::find($id);

        if (!$classRooms) {
            return $this->apiresponse($classRooms, 400, 'not found');
        }

        $classRooms->delete($id);

        if ($classRooms) {
            return $this->apiresponse($classRooms);
        }
    }
}
