@extends('penjualans.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>411192094 STORE Penjualan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('penjualans.create') }}">Tambah penjualan</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-responsive">
        <tr>
            <th>No</th>
            <th>No Penjualan</th>
            <th>Tanggal</th>
            <th>Kode Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Kode Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Barang</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($penjualans as $penjualan)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $penjualan->no_penjualan }}</td>
            <td>{{ $penjualan->tanggal }}</td>
            <td>{{ $penjualan->kode_pelanggan }}</td>
            <td>{{ $penjualan->nama_pelanggan }}</td>
            <td>{{ $penjualan->kode_barang }}</td>
            <td>{{ $penjualan->jumlah_barang }}</td>
            <td>{{ $penjualan->harga_barang }}</td>
            <td>
                <form action="{{ route('penjualans.destroy',$penjualan->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('penjualans.show',$penjualan->id) }}">Detail</a>

                    <a class="btn btn-primary" href="{{ route('penjualans.edit',$penjualan->id) }}">Ubah</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

{!! $penjualans->render() !!}

@endsection