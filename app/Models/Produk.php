<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory; 

    protected $fillable = [
        'nama_produk',
        'gambar',
        'harga',
        'stok',
        'keterangan',
        'updated_at',
        'created_at'

    ];

    public function pesanan_detail(){
        return $this->hasMany('App\Models\PesananDetail','produk_id', 'id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function pesanan() {
        return $this->belongTo(Pesanan::class);
    }
}

    