<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use App\Models\Company;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $companies = CompanyResource::collection(Company::all());
        return $this->apiresponse($companies, 200, 'ok');
    }

    public function show($id)
    {
        $companies = Company::find($id);
        if ($companies) {
            return $this->apiresponse(new CompanyResource($companies));
        }
        return $this->apiresponse($companies, 401, 'not found');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'tax_number' => 'required',
            'owner' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $companies = Company::create($request->all());

        if ($companies) {
            return $this->apiresponse(new CompanyResource($companies));
        } else {
            return $this->apiresponse($companies, 400, 'not saved');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'tax_number' => 'required',
            'owner' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiresponse(null, 400, $validator->errors());
        }

        $companies = Company::find($id);

        if (!$companies) {
            return $this->apiresponse($companies, 400, 'not found');
        }

        $companies->update($request->all());

        if ($companies) {
            return $this->apiresponse(new CompanyResource($companies));
        }
    }

    public function destroy($id)
    {
        $companies = Company::find($id);

        if (!$companies) {
            return $this->apiresponse($companies, 400, 'not found');
        }

        $companies->delete($id);

        if ($companies) {
            return $this->apiresponse($companies);
        }
    }
}
