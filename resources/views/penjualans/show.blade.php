@extends('penjualans.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Detail Data Penjualan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('penjualans.index') }}">Kembali</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>No Penjualan:</strong>
            {{ $penjualan->no_penjualan }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tanggal:</strong>
            {{ $penjualan->tanggal }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kode Pelanggan:</strong>
            {{ $penjualan->kode_pelanggan }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kode Barang:</strong>
            {{ $penjualan->kode_barang }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Jumlah Barang:</strong>
            {{ $penjualan->jumlah_barang }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Harga Barang:</strong>
            {{ $penjualan->harga_barang }}
        </div>
    </div>
</div>
@endsection