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
                'unit_price' => 1,
            ],
            [
                'title' => 'B',
                'unit_price' => 2,
            ],
            [
                'title' => 'C',
                'unit_price' => 3,
            ],
            [
                'title' => 'D',
                'unit_price' => 4,
            ],
            [
                'title' => 'E',
                'unit_price' => 5,
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
