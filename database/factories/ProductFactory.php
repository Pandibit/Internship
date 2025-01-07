<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $products =
        [
            'Nike Running Shoes',
            'Adidas Adizero',
            'Adidas Originals'
        ];


    private static $categories = [
        'Shoes',
        'Phones',
        'T-Shirts',
        'Jackets',
        'Laptops'
    ];

    private static $counter = 0;

    public function definition(): array
    {
//        $name = self::$products[self::$counter % count(self::$categories)];
        return [
            'name' => 'ATLETE ULTRABOOST 5 ADIDAS',
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement(['$300 USD', '$350 USD', '$400 USD']),
            'category_id' => 1
        ];
    }
}
