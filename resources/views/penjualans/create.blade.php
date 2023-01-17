@extends('penjualans.layout')

@section('content')
<div class="row align-items-md-center">
    <div class="col-lg-6">
        <h2>Tambah Data Penjualan</h2>
    </div>
    <div class="col-lg-6">
        <a class="btn btn-primary" href="{{ route('penjualans.index') }}">Kembali</a>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Ada kesalahan pada masukkan form .<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('penjualans.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Penjualan :</strong>
                <?php
                $kode = 'J';
                $angka = mt_rand(0000, 9999);

                $kodepenjualan = $kode . $angka;
                ?>
                <input type="text" name="no_penjualan" class="form-control" value="{{$kodepenjualan}}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal :</strong>
                <input type="date" name="tanggal" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Pelanggan :</strong>
                <select class="form-select" name="kode_pelanggan" id="kode_pelanggan">
                    @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->kode_pelanggan }}">{{ $pelanggan->kode_pelanggan }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Barang :</strong>
                <select class="form-select" name="kode_barang" id="kode_barang">
                    @foreach($barangs as $barang)
                    <option value="{{ $barang->kode_barang }}">{{ $barang->kode_barang }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah Barang :</strong>
                <input type="number" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Barang :</strong>
                <input type="number" name="harga_barang" class="form-control" placeholder="Harga Barang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection