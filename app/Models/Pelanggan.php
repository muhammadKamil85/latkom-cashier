<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';
    protected $guarded = [
        'id'
    ];

    public function product()
    {
        return $this->belongsTo(Transaksi::class);
    }
}