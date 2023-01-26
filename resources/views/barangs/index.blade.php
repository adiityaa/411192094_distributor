@extends('barangs.layout')

@section('content')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Data barang</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                <a class="breadcrumb-item" href="#">Tabel</a>
                <span class="breadcrumb-item active">Data Barang</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="text-left">
                <h2>Data Barang</h2>
            </div>
            <div class="text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addbarang">
                    Add Data Barang
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
                            <th>Kode barang</th>
                            <th>Nama barang</th>
                            <th>Stok Barang</th>
                            <th>Harga Barang</th>
                            <th>Total Penjualan</th>
                            <th>Total Pembelian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $barang->kode_barang }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>
                                @if ($barang->stok_barang == null)
                                {{0}} pcs
                                @else
                                {{ $barang->stok_barang }} pcs
                                @endif
                            </td>
                            <td>@currency($barang->harga_barang)</td>
                            <td>
                                @if ($barang->penjualan_barang == null)
                                {{0}} pcs
                                @else
                                {{ $barang->penjualan_barang }} pcs
                                @endif
                            </td>
                            <td> @if ($barang->pembelian_barang == null)
                                {{0}} pcs
                                @else
                                {{ $barang->pembelian_barang }} pcs
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button class="btn btn-success btn-tone m-r-5 btn-xs" data-toggle="modal" data-target="#detailbarang{{ $barang->kode_barang }}"><i class="anticon anticon-eye"></i></button>
                                    <button class="btn btn-warning btn-tone m-r-5 btn-xs" data-toggle="modal" data-target="#editbarang{{ $barang->kode_barang }}"><i class="anticon anticon-edit"></i></button>
                                    <button class="btn btn-danger btn-tone m-r-5 btn-xs" data-toggle="modal" data-target="#deletebarang{{ $barang->kode_barang }}"><i class="anticon anticon-delete"></i></button>
                                </div>
                                <!-- Modal Show Data -->
                                <div class="modal fade" id="detailbarang{{ $barang->kode_barang }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addbarangLabel">Barang {{ $barang->nama_barang }}</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <i class="anticon anticon-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Kode barang :</strong>
                                                            <input type="text" name="kode_barang" class="form-control" value="{{ $barang->kode_barang }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Nama barang :</strong>
                                                            <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Stok Barang :</strong>
                                                            <input type="number" name="stok_barang" class="form-control" value="{{ $barang->stok_barang }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Harga Barang :</strong>
                                                            <input type="number" name="harga_barang" class="form-control" value="{{ $barang->harga_barang }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Modal Show Data -->

                                <!-- Modal Edit Data -->
                                <div class="modal fade" id="editbarang{{ $barang->kode_barang }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addbarangLabel">Edit Barang</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <i class="anticon anticon-close"></i>
                                                </button>
                                            </div>
                                            <form action="{{ route('barangs.update',$barang->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Kode barang :</strong>
                                                                <input type="text" name="kode_barang" class="form-control" value="{{ $barang->kode_barang }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Nama barang :</strong>
                                                                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" placeholder="Nama barang">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Stok Barang :</strong>
                                                                <input type="number" name="stok_barang" class="form-control" value="{{ $barang->stok_barang }}" placeholder="Stok Barang">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Harga Barang :</strong>
                                                                <input type="number" name="harga_barang" class="form-control" value="{{ $barang->harga_barang }}" placeholder="Harga Barang">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Modal Edit Data -->

                                <!-- modal delete Data-->
                                <div id="deletebarang{{ $barang->kode_barang }}" class="modal fade" role="dialog" style="display:none;">
                                    <div class="modal-dialog">
                                        <form action="{{ route('barangs.destroy',$barang->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Barang</h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <i class="anticon anticon-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 align="center">Are you sure delete <strong><span class="grt">{{ $barang->nama_barang }}</span></strong> ?</h5>
                                                    <input type="hidden" id="id" name="id" value="{{ $barang->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End modal delete Data-->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Data -->
<div class="modal fade" id="addbarang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addbarangLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form action="{{ route('barangs.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Kode Barang :</strong>
                                <?php
                                $kode = 'B';
                                $angka = mt_rand(0000, 9999);

                                $kodebarang = $kode . $angka;
                                ?>
                                <input type="text" name="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror" value="{{$kodebarang}}" readonly>
                                @error('kode_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama Barang :</strong>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Nama Barang">
                                @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Stok Barang :</strong>
                                <input type="number" name="stok_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Stok Barang">
                                @error('stok_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Harga Barang :</strong>
                                <input type="number" name="harga_barang" class="form-control @error('harga_barang') is-invalid @enderror" placeholder="Harga Barang">
                                @error('harga_barang')
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