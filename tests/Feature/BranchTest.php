<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Branch;

class BranchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_branch()
    {
        $branch = Branch::factory()->create();
        $this->assertModelExists($branch);
    }

    public function test_update_branch()
    {
        $branch = Branch::orderBy('id', 'DESC')->first();
        $branch->update(['name' => 'moustafa']);
        $this->assertModelExists($branch);
    }

    public function test_delete_branch()
    {
        $branch = Branch::orderBy('id', 'DESC')->first();
        $branch->delete();
        $this->assertModelMissing($branch);
    }
}
