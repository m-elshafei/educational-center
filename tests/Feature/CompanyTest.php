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

    public function test_show_company()
    {
        $response = $this->resource('/company');
        // $response = $this->call('resource', '/compny');
        if ($response) {
            $response->assertDontSee(__('message.no_data_found'));
        } else {
            $response->assertSee(__('message.no_data_found'));
        }
    }


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
