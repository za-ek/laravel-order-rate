<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        // 419
        Artisan::call('config:cache');

        $response = $this->post('admin/config/orderMsg', ['message' => 'hello!']);
        $response->assertStatus(200);

        $response = $this->get('admin/config/orderMsg');
        $response->assertJson(['message' => 'hello!']);
    }
}
