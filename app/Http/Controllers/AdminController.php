<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('auth.admin.dashboard');
    }

    public function product()
    {
        $products = Product::all();
        if (session('image')) {
            Alert::error('Error', 'Image failed to upload!');
        }
        confirmDelete('Delete Product!', 'Are you sure you want to delete?');
        return view('auth.admin.product')->with('products', $products);
    }

    public function productStore(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameSave = $filename . '' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/img/product', $filenameSave);
            $validate['image'] = 'storage/img/product/' . $filenameSave;
        } else {
            Alert::error('Error', 'Image failed to upload!');
            return back();
        }
        $product = Product::create($validate);
        if ($product) {
            Alert::success('Success', 'Create product successfully!');
        } else {
            Alert::error('Failed', 'Create product failed!');
        }
        return redirect()->route('admin-product');
    }

    public function productAdd(Request $request, $id)
    {
        $value = $request->validate([
            'stock' => 'required'
        ]);
        $product = Product::where('id', $id)->update($value);
        if ($product) {
            Alert::success('Success', 'Add stock product successfully!');
        } else {
            Alert::error('Fail', 'Add stock product failed!');
        }
        return redirect()->route('admin-product');
    }

    public function productUpdate(Request $request, $id)
    {
        $value = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameSave = $filename . '' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/img/product', $filenameSave);
            $validate['image'] = 'storage/img/product/' . $filenameSave;
        }
        $product = Product::where('id', $id)->update($request->all());
        if ($product) {
            Alert::success('Success', 'Update product successfully!');
        } else {
            Alert::error('Fail', 'Update product failed!');
        }
        return redirect()->route('admin-product');
    }

    public function productDelete($id)
    {
        $product = Product::where('id', $id)->delete();
        if ($product) {
            Alert::success('Success', 'Product deleted successfully!');
        } else {
            Alert::error('Error', 'Product deleted failed!');
        }
        return redirect()->route('admin-product');
    }
}
