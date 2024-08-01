<?php

namespace Database\Seeders;

use App\Models\ItemOffers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemOffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itemOffers = [
            [
                'items_id' => 1,
                'title' => '3 for 2',
                'quantity' => 3,
                'price' => 2,
            ],
            [
                'items_id' => 3,
                'title' => '2 for 1',
                'quantity' => 2,
                'price' => 1,
            ],

        ];

        foreach ($itemOffers as $itemOffer) {
            ItemOffers::create($itemOffer);
        }
    }
}
