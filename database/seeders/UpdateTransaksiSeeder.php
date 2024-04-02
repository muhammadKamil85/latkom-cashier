<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use App\Models\Detail_Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $details = Detail_Transaction::all();
        foreach ($details as $key => $detail) {
            Transaksi::where('id', $key % Detail_Transaction::count())->update(['total_price' => $detail->subtotal]);
        }
    }
}
