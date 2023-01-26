<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    public $table = "pembelian";
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_pembelian', 'tanggal', 'id_supplier', 'id_barang', 'jumlah_barang', 'harga_barang', 'created_at', 'created_by'
    ];

    const CREATED_AT = 'created_at';
}
