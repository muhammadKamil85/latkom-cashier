<?php

namespace Database\Seeders;

use App\Models\Detail_Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detail_Transaction::factory(20)->create();
    }
}
