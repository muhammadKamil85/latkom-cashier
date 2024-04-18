<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function productIndex()
    {
        $products = Product::all();
        return view('auth.cashier.product', compact('products'));
    }

    public function transactionIndex()
    {
        $transactions = Transaksi::all();
        $products = Product::all();
        return view('auth.cashier.transaction', compact('transactions', 'products'));
    }
}
