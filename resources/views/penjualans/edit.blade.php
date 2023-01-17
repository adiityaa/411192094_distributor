@extends('penjualans.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ubah Data Penjualan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('penjualans.index') }}"> Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Ada kesalahan pada masukkan form<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('penjualans.update',$penjualan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No penjualan:</strong>
                <input type="text" name="no_penjualan" value="{{ $penjualan->no_penjualan }}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal:</strong>
                <input type="date" name="tanggal" value="{{ $penjualan->tanggal }}" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Pelanggan:</strong>
                <select class="form-select" name="kode_pelanggan" id="kode_pelanggan">
                    <option value="{{ $penjualan->kode_pelanggan }}">{{ $penjualan->kode_pelanggan }}</option>
                    @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->kode_pelanggan }}">{{ $pelanggan->kode_pelanggan }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kota:</strong>
                <strong>Kode Barang:</strong>
                <select class="form-select" name="kode_barang" id="kode_barang">
                    <option value="{{ $penjualan->kode_barang }}">{{ $penjualan->kode_barang }}</option>
                    @foreach($barangs as $barang)
                    <option value="{{ $barang->kode_barang }}">{{ $barang->kode_barang }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah Barang:</strong>
                <input type="number" name="jumlah_barang" value="{{ $penjualan->jumlah_barang }}" class="form-control" placeholder="Masukkan Jumlah Barang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Barang:</strong>
                <input type="number" name="harga_barang" value="{{ $penjualan->harga_barang }}" class="form-control" placeholder="Masukkan Harga Barang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>

</form>
@endsection