<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pelanggan;
use App\Models\Detail_Transaction;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\TransactionExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        confirmDelete('Delete Transaction!', 'Are you sure you want to delete?');
        return view('auth.admin.transaction', compact('transaksis'));
    }

    public function create(Request $request)
    {
        // $products = $request->shop;
        // $shop = [];
        // if(count($products) > 0) {
        //     foreach($products as $product) {
        //         $items = explode(";", $product);
        //         if($items[3] != 0){
        //             $shop[intval($items[0])] = [
        //                 'id' => intval($items[0]),
        //                 'name' => $items[1],
        //                 'price' => intval($items[2]),
        //                 'qty' => intval($items[3]),
        //                 'subtotal' => intval($items[4])
        //             ];
        //         }
        //     }
        // }
        $products = $request->shop;
        if($products){
            $shop = [];
            foreach($products as $items) {
                $item = explode(";", $items);
                if($item[3] != '0'){
                    $shop[] = $items;
                }
            }
            if(count($shop) == 0) {
                Alert::error('Failed', 'Please select the product');
                return back();
            }
            return view('auth.cashier.transaction-create', compact('shop'));
        }
        Alert::error('Failed', 'Please select the product');
        return back();
    }

    public function store(Request $request)
    {
        $pelanggan = [
            'name' => $request->name,
            'address' => $request->address,
            'no_hp' => $request->no_hp
        ];
        $check = Pelanggan::where([
            'name' => $pelanggan['name'],
            'address' => $pelanggan['address']
            ])->first();
        if(!$check){
            Pelanggan::create($pelanggan);
        }
        $user = Pelanggan::where([
            'name' => $pelanggan['name'],
            'address' => $pelanggan['address']
            ])->first();
        $products = $request->shop;
        $shop = [];
        $total = 0;
        if(count($products) > 0) {
            foreach($products as $product) {
                $items = explode(";", $product);
                $shop[] = [
                    'id' => intval($items[0]),
                    'name' => $items[1],
                    'price' => intval($items[2]),
                    'qty' => intval($items[3]),
                    'subtotal' => intval($items[4])
                ];
                $total += intval($items[4]);
            }
            Transaksi::create([
                'pelanggan_id' => $user->id,
                'user_id' => Auth::user()->id,
                'total_price' => $total
            ]);
            foreach($shop as $product) {
                Detail_Transaction::create([
                    'transaksi_id' => Transaksi::latest()->first()->id,
                    'qty' => $product['qty'],
                    'subtotal' => $product['subtotal'],
                    'product_id' => $product['id']
                ]);
            }
        }
        Alert::success('Success', 'Transaction successfully');
        return redirect()->route('admin-transaction');
    }

    public function exportExcel()
    {
        return Excel::download(new TransactionExport, csrf_token().'-Transaction.xlsx');
    }

    public function exportPdf($id)
    {
        $transaction = Transaksi::where('id', $id)->first();
        $pdf = Pdf::loadView('export.pdf.transaction', compact('transaction'));
        return $pdf->download(csrf_token().'-Transaction.pdf');

    }

    public function showCreate()
    {
        $products = Product::all();
        return view('create', compact('products'));
    }

    public function delete($id)
    {
        $transaction = Transaksi::where('id', $id)->delete();
        if ($transaction) {
            Alert::success('Success', 'Delete transaction successfully!');
        } else {
            Alert::error('Failed', 'Delete transaction failed!');
        }
        return redirect()->route('admin-transaction');
    }

}
