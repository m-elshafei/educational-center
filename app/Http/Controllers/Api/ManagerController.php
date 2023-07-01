<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use App\Models\Maneger;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ManagerResource;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $managers = ManagerResource::collection(Maneger::all());
        return $this->apiresponse($managers, 200, 'ok');
    }

    public function show($id)
    {
        $managers = Maneger::find($id);
        if ($managers) {
            return $this->apiresponse(new ManagerResource($managers));
        }
        return $this->apiresponse($managers, 401, 'not found');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'company_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $managers = Maneger::create($request->all());

        if ($managers) {
            return $this->apiresponse(new ManagerResource($managers));
        } else {
            return $this->apiresponse($managers, 400, 'not saved');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'company_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $managers = Maneger::find($id);

        if (!$managers) {
            return $this->apiresponse($managers, 400, 'not found');
        }

        $managers->update($request->all());

        if ($managers) {
            return $this->apiresponse(new ManagerResource($managers));
        }
    }

    public function destroy($id)
    {
        $managers = Maneger::find($id);

        if (!$managers) {
            return $this->apiresponse($managers, 400, 'not found');
        }

        $managers->delete($id);

        if ($managers) {
            return $this->apiresponse($managers);
        }
    }
}
