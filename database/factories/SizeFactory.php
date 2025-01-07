<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Laravel\Prompts\select;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $sizes =
        [
            'XS', 'S', 'M', 'L', 'XL', 'XXL', 36, 37, 38, 39, 40, 41, 41, 42, 43, 44
        ];

    private static $counter = 0;

    public function definition(): array
    {
        $sizes = self::$sizes[self::$counter % count(self::$sizes)];
        self::$counter++;
        return [
            'size_name' => $sizes
            //
        ];
    }
}
