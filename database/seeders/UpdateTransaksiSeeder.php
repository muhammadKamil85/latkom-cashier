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
        $i = 1;
        foreach ($details as $key => $detail) {
            Detail_Transaction::where('id', $i++)->update(['subtotal' => $detail->subtotal * $detail->qty]);
        }

        $k = 1;
        $transaksis = Transaksi::all();
        foreach ($transaksis as $key => $transaksi) {
            Transaksi::where('id', $transaksi->id)->update(['total_price' => Detail_Transaction::where('transaksi_id', $transaksi->id)->sum('subtotal')]);
        }
    }
}
