<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\ApiResponse;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $Categories = CategoryResource::collection(Category::all());
        return $this->apiresponse($Categories, 200, 'ok');
    }

    public function show($id)
    {
        $Categories = Category::find($id);
        if ($Categories) {
            return $this->apiresponse(new CategoryResource($Categories));
        }
        return $this->apiresponse($Categories, 401, 'not found');
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

        $Categories = Category::create($request->all());

        if ($Categories) {
            return $this->apiresponse(new CategoryResource($Categories));
        } else {
            return $this->apiresponse($Categories, 400, 'not saved');
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

        $Categories = Category::find($id);

        if (!$Categories) {
            return $this->apiresponse($Categories, 400, 'not found');
        }

        $Categories->update($request->all());

        if ($Categories) {
            return $this->apiresponse(new CategoryResource($Categories));
        }
    }

    public function destroy($id)
    {
        $Categories = Category::find($id);

        if (!$Categories) {
            return $this->apiresponse($Categories, 400, 'not found');
        }

        $Categories->delete($id);

        if ($Categories) {
            return $this->apiresponse($Categories);
        }
    }
}
