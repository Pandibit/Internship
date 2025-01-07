<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $categories =
        [
            'Shoes',
            'Phones',
            'T-shirts',
            'Jackets',
            'Laptops'
        ];
    private static $counter = 0;
    public function definition(): array
    {
        $name = self::$categories[self::$counter % count(self::$categories) ];
        self::$counter++;
        return [
            'name'=>$name
        ];
    }
}
