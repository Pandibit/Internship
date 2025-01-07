<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category_Images>
 */
class CategoryImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $imagePaths = [
        'category_images/Shoes.jpg',
        'category_images/Phones.jpg',
        'category_images/T-shirts.jpg',
        'category_images/Jackets.jpg',
        'category_images/Laptops.jpg',
    ];

    private static $counter = 0;

    public function definition(): array
    {
        $imagePath = self::$imagePaths[self::$counter % count(self::$imagePaths)];
        self::$counter++;
        return [
            'category_id' => Category::factory(),
            'category_image_url' => Storage::url($imagePath),
            //
        ];
    }
}
