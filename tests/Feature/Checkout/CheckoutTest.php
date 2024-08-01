<?php

namespace Tests\Feature\Checkout;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Response;
use Tests\TestCase;

class CheckoutTest extends TestCase
{

    private function test_request($items_id)
    {
        return $this->post('/api/checkout', [
            'items_id' => $items_id, // adding new order to existing order list
            'order_list' => [
                [
                    'items_id' => 1,
                    'quantity' => 2,
                    'price' => 2,
                ],
                [
                    'items_id' => 2,
                    'quantity' => 2,
                    'price' => 4,
                ],
                [
                    'items_id' => 3,
                    'quantity' => 1,
                    'price' => 3,
                ],

            ],
            'total_amount' => 4,
        ]);
    }

    public function test_add_another_item_with_offer(): void
    {

        $response = $this->test_request(1);
        // get total_amount from the response
        $totalAmount = $response->json()['total_amount'];

        $this->assertEquals(9, $totalAmount);

        $response->assertStatus(200);
    }


    public function test_add_item_with_no_offer(): void
    {
        $response = $this->test_request(2);
        // get total_amount from the response
        $totalAmount = $response->json()['total_amount'];

        $this->assertEquals(11, $totalAmount);

        $response->assertStatus(200);
    }

    public function test_add_item_not_found(): void
    {
        $response = $this->test_request(9);
        // get total_amount from the response
        $totalAmount = $response->json();

        $this->assertEquals('Item not found', $totalAmount);

        $response->assertStatus(500);
    }
}
