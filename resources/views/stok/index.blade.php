@extends('layouts.master')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-server icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Stok
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <button href="" class="btn-shadow btn btn-info" data-target="#tambahbahanbaku"
                            data-toggle="modal">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="pe-7s-plus"> </i>
                            </span>
                            Tambah Bahan Baku
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if ($errors->any())
                      @foreach ($errors->all() as $error)
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $error }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endforeach
                @endif
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h3 class="card-title">Daftar Stok</h3>
                        <table class="mb-0 table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bahan Baku</th>
                                    <th>Stok ( gram )</th>
                                    <th>Jenis Bahan Baku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$item['nama']}}</td>
                                    <td>{{$item['stok']}}</td>
                                    <td>{{($item['jenis'] == 1) ? "Kopi" : "Lainnya"}}</td>
                                    <td>
                                        <button type="button" class="btn btn-lg btn-success text-white tambahStok"
                                            data-toggle="modal" data-target="#TambahStok" data-id="{{$item['id']}}" data-nama="{{$item['nama']}}"><i
                                                class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-lg btn-warning text-white ubah"
                                            data-toggle="modal" data-target="#UbahData" data-id="{{$item['id']}}" data-nama="{{$item['nama']}}" data-jenis="{{$item['jenis']}}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-lg btn-danger text-white hapus"
                                            data-toggle="modal" data-target="#HapusData" data-id="{{$item['id']}}" data-nama="{{$item['nama']}}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-wrapper-footer">
        <div class="app-footer">
            <div class="app-footer__inner">
                <div class="app-footer-right">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                SiniKopi
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="modal fade" id="HapusData" tabindex="-1" role="dialog" aria-labelledby="HapusDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="HapusDataLabel">Hapus Data <span class="nama"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form-hapus" method="POST">
                    @csrf @method('DELETE')
                    Apakah Anda Yakin Ingin Menghapus <span class="nama"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="tambahbahanbaku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bahanbaku</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form action="{{ route('bahan-baku.store') }}" method="post" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="nama">Nama Bahanbaku</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Bahanbaku"
                                name="nama" required>
                            <div class="invalid-feedback">
                                Masukkan Nama Dengan Benar !
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="jenis">Jenis Bahanbaku</label>
                            <select id="jenis" name="jenis" class="form-control" required>
                                <option value="">--- Pilih Jenis Bahanbaku ---</option>
                                <option value="1">Kopi</option>
                                <option value="2">Lainnya</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih Jenis Bahanbaku Dengan Benar !
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="UbahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Bahanbaku</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form action="" id="form-ubah" method="post" class="needs-validation">
                @csrf @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="nama">Nama Bahanbaku</label>
                            <input type="text" class="form-control ubah-nama" id="nama" placeholder="Masukkan Nama Bahanbaku"
                                name="nama" required>
                            <div class="invalid-feedback">
                                Masukkan Nama Dengan Benar !
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="jenis">Jenis Bahanbaku</label>
                            <select id="jenis" name="jenis" class="form-control ubah-jenis" required>
                                <option value="">--- Pilih Jenis Bahanbaku ---</option>
                                <option value="1">Kopi</option>
                                <option value="2">Lainnya</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih Jenis Bahanbaku Dengan Benar !
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="TambahStok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Stok : <span id="nama_bahanbaku"></span></h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form action="" method="post" class="needs-validation form-tambah-stok">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" id="id_bahanbaku" placeholder="Masukkan Nama Bahanbaku" name="id" required>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="tglbeli">Tanggal Beli (Bulan/Hari/Tahun)</label>
                            <input type="date" class="form-control" id="tglbeli" placeholder="Masukkan tanggal beli" aria-describedby="inputGroupPrepend" name="tgl_beli" value="<?= $now = date('Y-m-d') ?>" required>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="tglkadaluarsa">Tanggal Kadaluarsa (Bulan/Hari/Tahun)</label>
                            <input type="date" class="form-control" id="tglkadaluarsa" placeholder="Masukkan tanggal kadaluarsa" aria-describedby="inputGroupPrepend" name="tgl_kadaluarsa" value="<?= date('Y-m-d', strtotime('+21 day', strtotime($now))) ?>" required>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="stok_bahanbaku">Jumlah Stok ( Gram )</label>
                            <input type="number" class="form-control" min="1" id="stok_bahanbaku" placeholder="Masukkan jumlah stok bahanbaku" aria-describedby="inputGroupPrepend" name="jumlah_beli" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script')
<script>
    $(document).ready(function () {
        $('.hapus').click(function(){
            var id = $(this).data('id');
            var url = "{{url('/bahan-baku')}}" + '/' + id;
            $('#form-hapus').attr('action', url);
            $('.nama').html($(this).data('nama'));
        });
        $('.ubah').click(function(){
            var id = $(this).data('id');
            var url = "{{url('/bahan-baku')}}" + '/' + id;
            $('#form-ubah').attr('action', url);
            $('.ubah-nama').val($(this).data('nama'));
            $('.ubah-jenis').val($(this).data('jenis')).change();
        });
        $('.tambahStok').click(function(){
            var id = $(this).data('id');
            var url = "{{url('/stok')}}";
            $('.form-tambah-stok').attr('action', url);
            $('#id_bahanbaku').val(id);
            $('#nama_bahanbaku').html($(this).data('nama'));
        });
    });
</script>
@endsection
