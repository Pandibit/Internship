<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Product;
use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_Images>
 */
class ProductImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $imagePaths = [
        'product_images/AdidasUltraBoost-1.jpg',
        'product_images/AdidasUltraBoost-2.jpg',
        'product_images/AdidasUltraBoost-3.jpg',
    ];

    private static $counter = 0;

    private static $colors = ['white', 'green', 'black'];

    private static function getColors()
    {
        self::$colors = Color::take(3)->get();
        return self::$colors;
    }

    public function definition(): array
    {

        $imagePath = self::$imagePaths[self::$counter % count(self::$imagePaths)];
        $colors = self::getColors();
        $color = $colors[self::$counter % count($colors)];
        self::$counter++;
        return [
            'image_url' => 'storage/' . $imagePath,
            'color_id' => $color,
            'product_id' => Product::orderBy('id', 'desc')->first()->id,
        ];
    }
}
