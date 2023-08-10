<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $productName = $this->faker->randomElement([
            "Laptop", "Smartphone", "Shoes", "T-shirt", "Headphones",
            "Watch", "Sunglasses", "Backpack", "Camera", "Coffee Maker",
            "Blender", "Desk Chair", "Bed Sheets", "Umbrella", "Water Bottle"
        ]);

        return [
            'code' => strtoupper(substr($productName, 0, 1)) . rand(100, 999),
            'name' => $productName,
            'quantity' => $this->faker->numberBetween(1, 30),
            'location' => $this->faker->city . ', India',
            'store_name' => $this->faker->company . ' Store',
            'stock_date' => $this->faker->dateTimeThisYear(),
            'is_in_stock' => $this->faker->randomElement(['0','1'])
        ];
    }

}
