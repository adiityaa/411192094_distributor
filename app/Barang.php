<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = "barang";
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_barang', 'nama_barang', 'stok_barang', 'harga_barang'
    ];
}
