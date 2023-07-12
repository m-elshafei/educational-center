<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
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
