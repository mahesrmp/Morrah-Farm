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

    public function pesanan_details(){
        return $this->hasMany('App\PesananDetails','produk_id', 'id');
    }
}

    