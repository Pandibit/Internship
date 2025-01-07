<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;
use function Laravel\Prompts\select;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $sizes = [];
    private static $colors = [];

    private static function getSizes()
    {
        self::$sizes = Size::all();
        return self::$sizes;
    }

    private static function getColors()
    {
        self::$colors = Color::all();
        return self::$colors;
    }

    protected static $combinations = [];
    protected static $index = 0;

    public function definition(): array
    {

        if (empty(self::$combinations)) {
            $colors = self::getColors();
            $sizes = self::getSizes();
            foreach ($sizes as $size) {
                foreach ($colors as $color) {
                    self::$combinations[] = [
                        'color_id' => $color,
                        'size_id' => $size,
                        'category_id' => 1,
                        'product_id' => 7,
                        'quantity' => 100,
                    ];

                }
            }
        }

        $combination = self::$combinations[self::$index];
        self::$index++;

        if (self::$index >= count(self::$combinations)) {
            self::$index = 0;
        }

        return $combination;
    }
}
