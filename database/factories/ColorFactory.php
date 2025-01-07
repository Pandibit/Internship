<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Color>
 */
class ColorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $colors = [
        'blue',
        'green',
        'black',
        'white',
        'purple'
    ];

    private static $counter = 0;

    public function definition(): array
    {
        $name = self::$colors[self::$counter % count(self::$colors)];
        self::$counter++;
        return [
            'name' => $name,
            //
        ];
    }
}
