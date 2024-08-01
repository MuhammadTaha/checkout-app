<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'A',
                'unit_price' => 0.25,
            ],
            [
                'title' => 'B',
                'unit_price' => 0.60,
            ],
            [
                'title' => 'C',
                'unit_price' => 0.15,
            ],
            [
                'title' => 'D',
                'unit_price' => 0.50,
            ],
            [
                'title' => 'E',
                'unit_price' => 0.80,
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
