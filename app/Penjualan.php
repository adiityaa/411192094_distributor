<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    public $table = "penjualan";
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_penjualan', 'tanggal', 'id_pelanggan', 'id_barang', 'jumlah_barang', 'harga_barang', 'created_at', 'created_by'
    ];

    const CREATED_AT = 'created_at';
}
