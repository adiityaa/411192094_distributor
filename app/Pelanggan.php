<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    public $table = "pelanggan";
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_pelanggan', 'nama_pelanggan', 'alamat', 'no_telepon'
    ];
}
