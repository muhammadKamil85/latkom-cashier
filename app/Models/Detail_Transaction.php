<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Transaction extends Model
{
    use HasFactory;
    protected $table = 'detail_transactions';
    protected $guarded = [
        'id'
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
