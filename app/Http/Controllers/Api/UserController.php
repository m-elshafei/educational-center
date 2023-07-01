<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $Users = UserResource::collection(User::all());
        return $this->apiresponse($Users, 200, 'ok');
    }

    public function show($id)
    {
        $Users = User::find($id);
        if ($Users) {
            return $this->apiresponse(new UserResource($Users));
        }
        return $this->apiresponse($Users, 401, 'not found');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
         'name' => 'required|max:255',
            'name_ar' => 'required',
            'email ' => 'required',
            'password ' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $Users = User::create($request->all());

        if ($Users) {
            return $this->apiresponse(new UserResource($Users));
        } else {
            return $this->apiresponse($Users, 400, 'not saved');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'name_ar' => 'required',
            'email ' => 'required',
            'password ' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $Users = User::find($id);

        if (!$Users) {
            return $this->apiresponse($Users, 400, 'not found');
        }

        $Users->update($request->all());

        if ($Users) {
            return $this->apiresponse(new UserResource($Users));
        }
    }

    public function destroy($id)
    {
        $Users = User::find($id);

        if (!$Users) {
            return $this->apiresponse($Users, 400, 'not found');
        }

        $Users->delete($id);

        if ($Users) {
            return $this->apiresponse($Users);
        }
    }
}
