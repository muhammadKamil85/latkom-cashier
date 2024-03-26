<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('auth.admin.dashboard');
    }

    public function product()
    {
        $products = Product::all();
        return view('auth.admin.product')->with('products', $products);
    }
}
