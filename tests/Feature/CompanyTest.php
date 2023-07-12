<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Company;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $companies;
    public function test_create_company()
    {
        $company = Company::factory()->create();
        $this->assertModelExists($company);
    }

    public function test_update_company()
    {
        $company = Company::orderBy('id', 'DESC')->first();
        $company->update(['owner' => 'moustafa']);
        $this->assertModelExists($company);
    }

    public function test_delete_company()
    {
        $company = Company::orderBy('id', 'DESC')->first();
        $company->delete();
        $this->assertModelMissing($company);
    }
}
