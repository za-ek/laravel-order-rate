<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Tests\TestCase;

class OrderCommentTest extends TestCase
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

        $str = Str::random(40);

        $response = $this->post('/orders/0/comment', ['comment' => $str]);
        $response->assertStatus(200);

        $response = $this->get('/orders/0/comment');

        $response->assertStatus(200);
        $response->assertJson(['comment' => $str]);
    }
}
