@extends('pembelians.layout')

@section('content')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Data Pembelian</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                <a class="breadcrumb-item" href="#">Tabel</a>
                <span class="breadcrumb-item active">Data pembelian</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="text-left">
                <h2>Data Pembelian</h2>
            </div>
            <div class="text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpembelian">
                    Add Data Pembelian
                </button>
            </div>
            <div class="m-t-25 table-responsive">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif ($message = Session::get('gagal'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif ($message = Session::get('updated'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif ($message = Session::get('deleted'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <table id="data-table" class="table table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Pembelian</th>
                            <th>Tanggal Pembelian</th>
                            <th>Nama Supplier</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Harga Barang</th>
                            <th>Tanggal Input</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelians as $pembelian)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $pembelian->no_pembelian }}</td>
                            <td>{{ $pembelian->tanggal }}</td>
                            <td>{{ $pembelian->nama_supplier }}</td>
                            <td>{{ $pembelian->nama_barang }}</td>
                            <td>{{ $pembelian->jumlah_barang }}</td>
                            <td>@currency($pembelian->harga_barang)</td>
                            <td>{{ $pembelian->created_at }}</td>
                            <td>{{ $pembelian->created_by }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Data -->
<div class="modal fade" id="addpembelian">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addpembelianLabel">Tambah Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form action="{{ route('pembelians.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Kode pembelian :</strong>
                                <?php
                                $kode = 'PB';
                                $angka = mt_rand(0000, 9999);

                                $kodepembelian = $kode . $angka;
                                ?>
                                <input type="text" name="no_pembelian" class="form-control @error('no_pembelian') is-invalid @enderror" value="{{$kodepembelian}}" readonly>
                                @error('no_pembelian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tanggal :</strong>
                                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{$kodepembelian}}">
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama Supplier :</strong>
                                <select class="select2 @error('id_supplier') is-invalid @enderror" name="id_supplier" id="id_supplier">
                                    @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                                    @endforeach
                                </select>
                                @error('id_supplier')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama Barang :</strong>
                                <select class="select2 @error('id_barang') is-invalid @enderror" name="id_barang" id="id_barang">
                                    @foreach($barangs as $barang)
                                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                    @endforeach
                                </select>
                                @error('id_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Jumlah Barang :</strong>
                                <input type="number" class="form-control @error('jumlah_barang') is-invalid @enderror" name="jumlah_barang" placeholder="Jumlah Barang">
                                @error('jumlah_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Harga Barang :</strong>
                                <select class="select2 @error('harga_barang') is-invalid @enderror" name="harga_barang" id="harga_barang">
                                    @foreach($barangs as $barang)
                                    <option value="{{ $barang->harga_barang }}">{{ $barang->harga_barang }}</option>
                                    @endforeach
                                </select>
                                @error('harga_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control @error('created_at') is-invalid @enderror" name="created_at" value="{{ Carbon\Carbon::now()->format('Y-m-d').' '.Carbon\Carbon::now()->format('H:i') }}">
                                @error('created_at')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @auth
                                <input type="hidden" class="form-control @error('created_by') is-invalid @enderror" name="created_by" value="{{ auth()->user()->name }}">
                                @endauth
                                @error('created_by')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Add Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection