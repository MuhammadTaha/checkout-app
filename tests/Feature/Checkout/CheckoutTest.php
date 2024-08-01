<?php

namespace Tests\Feature\Checkout;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Response;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    /**
     * Test multiple items added.
     */
    public function test_multiple_items_add(): void
    {
        $response = $this->post('/api/checkout', [
            'items_id' => 1,
            'order_list' => [
                [
                    'items_id' => 1,
                    'quantity' => 1,
                ],
                [
                    'items_id' => 2,
                    'quantity' => 1,
                ],
            ],
            'total_amount' => 2,
        ]);

        $this->assertInstanceOf(Response::class, $response->json());

        $response->assertJsonIsObject([
            'order_list' => [
                [
                    'items_id' => 1,
                    'quantity' => 2,
                    'total_price' => 2,

                ],
                [
                    'items_id' => 2,
                    'quantity' => 1,
                    'total_price' => 1,
                ],
            ],
            'total_amount' => 2.5,
        ]);

        $response->assertStatus(200);
    }
}
