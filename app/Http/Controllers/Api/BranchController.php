<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $branches = BranchResource::collection(Branch::all());
        return $this->apiresponse($branches, 200, 'ok');
    }

    public function show($id)
    {
        $branches = Branch::find($id);
        if ($branches) {
            return $this->apiresponse(new BranchResource($branches));
        }
        return $this->apiresponse($branches, 401, 'not found');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'location' => 'required',
            'company_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $branches = Branch::create($request->all());

        if ($branches) {
            return $this->apiresponse(new BranchResource($branches));
        } else {
            return $this->apiresponse($branches, 400, 'not saved');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'location' => 'required',
            'company_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $branches = Branch::find($id);

        if (!$branches) {
            return $this->apiresponse($branches, 400, 'not found');
        }

        $branches->update($request->all());

        if ($branches) {
            return $this->apiresponse(new BranchResource($branches));
        }
    }

    public function destroy($id)
    {
        $branches = Branch::find($id);

        if (!$branches) {
            return $this->apiresponse($branches, 400, 'not found');
        }

        $branches->delete($id);

        if ($branches) {
            return $this->apiresponse($branches);
        }
    }
}
