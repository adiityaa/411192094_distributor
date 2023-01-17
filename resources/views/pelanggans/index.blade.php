@extends('pelanggans.layout')

@section('content')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Data Pelanggan</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                <a class="breadcrumb-item" href="#">Tabel</a>
                <span class="breadcrumb-item active">Data Pelanggan</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="text-left">
                <h2>Data Pelanggan</h2>
            </div>
            <div class="text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPelanggan">
                    Add Data Pelanggan
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
                            <th>Kode Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggans as $pelanggan)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $pelanggan->kode_pelanggan }}</td>
                            <td>{{ $pelanggan->nama_pelanggan }}</td>
                            <td>{{ $pelanggan->alamat }}</td>
                            <td>{{ $pelanggan->no_telepon }}</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button class="btn btn-success btn-tone m-r-5 btn-xs" data-toggle="modal" data-target="#detailPelanggan{{ $pelanggan->kode_pelanggan }}"><i class="anticon anticon-eye"></i></button>
                                    <button class="btn btn-warning btn-tone m-r-5 btn-xs" data-toggle="modal" data-target="#editPelanggan{{ $pelanggan->kode_pelanggan }}"><i class="anticon anticon-edit"></i></button>
                                    <button class="btn btn-danger btn-tone m-r-5 btn-xs" data-toggle="modal" data-target="#deletePelanggan{{ $pelanggan->kode_pelanggan }}"><i class="anticon anticon-delete"></i></button>
                                </div>
                                <!-- Modal Show Data -->
                                <div class="modal fade" id="detailPelanggan{{ $pelanggan->kode_pelanggan }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addPelangganLabel">Pelanggan {{ $pelanggan->nama_pelanggan }}</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <i class="anticon anticon-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Kode Pelanggan :</strong>
                                                            <input type="text" name="kode_pelanggan" class="form-control" value="{{ $pelanggan->kode_pelanggan }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Nama Pelanggan :</strong>
                                                            <input type="text" name="nama_pelanggan" class="form-control" value="{{ $pelanggan->nama_pelanggan }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Alamat :</strong>
                                                            <textarea class="form-control" name="alamat" rows="4" readonly>{{ $pelanggan->alamat }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>No Telepon :</strong>
                                                            <input type="number" name="no_telepon" class="form-control" value="{{ $pelanggan->no_telepon }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Modal Show Data -->

                                <!-- Modal Edit Data -->
                                <div class="modal fade" id="editPelanggan{{ $pelanggan->kode_pelanggan }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addPelangganLabel">Edit Pelanggan</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <i class="anticon anticon-close"></i>
                                                </button>
                                            </div>
                                            <form action="{{ route('pelanggans.update',$pelanggan->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Kode Pelanggan :</strong>
                                                                <input type="text" name="kode_pelanggan" class="form-control" value="{{ $pelanggan->kode_pelanggan }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Nama Pelanggan :</strong>
                                                                <input type="text" name="nama_pelanggan" class="form-control" value="{{ $pelanggan->nama_pelanggan }}" placeholder="Nama Pelanggan">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Alamat :</strong>
                                                                <textarea class="form-control" name="alamat" rows="4">{{ $pelanggan->alamat }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>No Telepon :</strong>
                                                                <input type="number" name="no_telepon" class="form-control" value="{{ $pelanggan->no_telepon }}" placeholder="Nomor Telepon">
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
                                <div id="deletePelanggan{{ $pelanggan->kode_pelanggan }}" class="modal fade" role="dialog" style="display:none;">
                                    <div class="modal-dialog">
                                        <form action="{{ route('pelanggans.destroy',$pelanggan->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Pelanggan</h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <i class="anticon anticon-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 align="center">Are you sure delete <strong><span class="grt">{{ $pelanggan->nama_pelanggan }}</span></strong> ?</h5>
                                                    <input type="hidden" id="id" name="id" value="{{ $pelanggan->id }}">
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
<div class="modal fade" id="addPelanggan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPelangganLabel">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form action="{{ route('pelanggans.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Kode Pelanggan :</strong>
                                <?php
                                $kode = 'P';
                                $angka = mt_rand(0000, 9999);

                                $kodepelanggan = $kode . $angka;
                                ?>
                                <input type="text" name="kode_pelanggan" class="form-control @error('kode_pelanggan') is-invalid @enderror" value="{{$kodepelanggan}}" readonly>
                                @error('kode_pelanggan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama Pelanggan :</strong>
                                <input type="text" name="nama_pelanggan" class="form-control @error('nama_pelanggan') is-invalid @enderror" placeholder="Nama Pelanggan">
                                @error('nama_pelanggan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Alamat :</strong>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="4"></textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>No Telepon :</strong>
                                <input type="number" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" placeholder="Nomor Telepon">
                                @error('no_telepon')
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

{!! $pelanggans->render() !!}

@endsection