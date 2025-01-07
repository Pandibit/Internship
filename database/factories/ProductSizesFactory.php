<?php

namespace Database\Factories;

use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSizes>
 */
class ProductSizesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $counter = 0;

    private static $sizes = [];

    private static function getSizes()
    {
        self::$sizes = Size::skip(6)->take(10)->get();
        return self::$sizes;
    }

    public function definition(): array
    {
        $sizes = self::getSizes();
        $size_id = $sizes[self::$counter % count($sizes)];
        self::$counter++;
        return [
            'size_id' => $size_id,
            'product_id' => 7,
        ];
    }
}
