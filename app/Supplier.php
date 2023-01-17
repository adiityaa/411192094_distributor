<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $table = "supplier";
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_supplier', 'nama_supplier', 'alamat', 'no_telepon'
    ];
}
