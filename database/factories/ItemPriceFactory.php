<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // $table->foreignId('item_id')->constrained();
            // $table->string('title');
            // $table->integer('quantity');
            // $table->float('percentage', 2);

            'item_id' => $this->faker->numberBetween(1, 10),
            'title' => "3 for 2",
            'quantity' => $this->faker->numberBetween(1, 10),
            'percentage' => $this->faker->randomFloat(2, 1, 100),


        ];
    }
}
