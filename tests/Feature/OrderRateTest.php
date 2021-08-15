<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class OrderRateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_order_rate()
    {
        // 419
        Artisan::call('config:cache');

        $response = $this->post('/orders/0/rate/2');
        $response->assertStatus(200);

        $response = $this->get('/orders/0/rate');

        $response->assertStatus(200);
        $response->assertJson(['rate' => 2]);
    }
}
