<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detail_Transaction>
 */
class Detail_TransactionFactory extends Factory
{

    private static $transaksiId = 0;
    private static $productId = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        self::$transaksiId++;
        self::$productId++;
        if (self::$transaksiId > Transaksi::count()) {
            self::$transaksiId = 1;
        }
        if (self::$productId > Product::count()) {
            self::$productId = 1;
        }

        return [
            'transaksi_id' => self::$transaksiId,
            'product_id' => self::$productId,
            'qty' => fake()->numberBetween(1, 3),
            'subtotal' => Product::where('id', self::$productId)->sum('price')
        ];
    }
}
