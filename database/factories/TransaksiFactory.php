<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $i = 1;
        for($i; $i < env('PELANGGAN_SEEDER'); $i++){
        return [
            'pelanggan_id' => $i %= env('PELANGGAN_SEEDER'),
            'total_price' => fake('id_ID')->randomNumber(6, true)
        ];
    }
    }
}
