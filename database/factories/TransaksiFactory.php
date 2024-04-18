<?php

namespace Database\Factories;

use App\Models\Detail_Transaction;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    private static $pelangganId = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        self::$pelangganId++;
        if (self::$pelangganId > Pelanggan::count()) {
            self::$pelangganId = 1;
        }

        return [
            'pelanggan_id' => self::$pelangganId,
            'user_id' => 2,
            'total_price' => fake('id_ID')->randomNumber()
        ];
    }
}
