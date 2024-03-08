<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $guarded = [
        'id'
    ];

    public function pelanggans()
    {
        return $this->hasMany(Pelanggan::class);
    }

    public function detail_transaction()
    {
        return $this->belongsTo(Detail_Transaction::class);
    }
}
