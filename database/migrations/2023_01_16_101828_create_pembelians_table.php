<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->increments('id')->length(11);
            $table->string('no_pembelian')->length(15);
            $table->date('tanggal');
            $table->integer('id_supplier')->length(11);
            $table->integer('id_barang')->length(25);
            $table->integer('jumlah_barang')->length(11);
            $table->integer('harga_barang')->length(11)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->string('created_by')->length(50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelians');
    }
}
