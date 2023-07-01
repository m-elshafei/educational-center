<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use App\Models\Vendor;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VendorResource;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $vendors = VendorResource::collection(Vendor::all());
        return $this->apiresponse($vendors, 200, 'ok');
    }

    public function show($id)
    {
        $vendors = Vendor::find($id);
        if ($vendors) {
            return $this->apiresponse(new VendorResource($vendors));
        }
        return $this->apiresponse($vendors, 401, 'not found');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'configration' => 'required',
            'capacity' => 'required',
            'branch_id ' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $vendors = Vendor::create($request->all());

        if ($vendors) {
            return $this->apiresponse(new VendorResource($vendors));
        } else {
            return $this->apiresponse($vendors, 400, 'not saved');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'configration' => 'required',
            'capacity' => 'required',
            'branch_id ' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $vendors = Vendor::find($id);

        if (!$vendors) {
            return $this->apiresponse($vendors, 400, 'not found');
        }

        $vendors->update($request->all());

        if ($vendors) {
            return $this->apiresponse(new VendorResource($vendors));
        }
    }

    public function destroy($id)
    {
        $vendors = Vendor::find($id);

        if (!$vendors) {
            return $this->apiresponse($vendors, 400, 'not found');
        }

        $vendors->delete($id);

        if ($vendors) {
            return $this->apiresponse($vendors);
        }
    }
}
