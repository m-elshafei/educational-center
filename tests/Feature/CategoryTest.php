<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Traits\ApiResponse;

class CategoryTest extends TestCase
{
    use ApiResponse;

    /**
     * A basic feature test example.
     */


    public function test_create_category()
    {
        $category = Category::factory()->create();
        $this->assertModelExists($category);
    }


    public function test_update_category()
    {
        $category = Category::orderBy('id', 'DESC')->first();
        $category->update(['name' => 'moustafa']);
        $this->assertModelExists($category);
    }


    public function test_delete_category()
    {
        $category = Category::orderBy('id', 'DESC')->first();
        $category->delete();
        $this->assertModelMissing($category);
    }


}
