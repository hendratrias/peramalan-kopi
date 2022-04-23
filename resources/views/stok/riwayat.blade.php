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
                    <div>Riwayat Stok
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
                        <h3 class="card-title">Daftar Riwayat Stok</h3>
                        <table class="mb-0 table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bahan Baku</th>
                                    <th>Tanggal Beli</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    <th>Jumlah Beli</th>
                                    <th>Sisa</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)

                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$item->bahan_baku->nama}}</td>
                                    <td>{{$item->tgl_beli}}</td>
                                    <td>{{$item->tgl_kadaluarsa}}</td>
                                    <td>{{$item->jumlah_beli}}</td>
                                    <td>{{$item->sisa}}</td>
                                    <td>{!!($item->status == 1) ? "<div class='badge badge-success'>Tersedia</div>" : "<div class='badge badge-danger'>Habis</div>"!!}</td>
                                    <td>
                                        <button type="button"  class="btn btn-lg btn-warning text-white ubah"  data-toggle="modal"  data-sisa="{{$item->sisa}}"
                                        data-target="#UbahData" data-id="{{$item->id}}" data-jumlah="{{$item->jumlah_beli}}" data-status="{{$item->status}}" 
                                        data-tgl_beli="{{$item->tgl_beli}}" data-tgl_kadaluarsa="{{$item->tgl_kadaluarsa}}" data-nama="{{$item->bahan_baku->id}}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button"  class="btn btn-lg btn-danger text-white hapus"  data-toggle="modal" data-target="#HapusData" data-id="{{$item->id}}" data-tgl="{{$item->tgl_beli}}" data-nama="{{$item->bahan_baku->nama}}"><i class="fa fa-trash"></i></button>
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
            Apakah Anda Yakin Ingin Menghapus Stok <span class="nama"></span> tanggal <span class="tgl"></span>
            <input type="hidden" name="id" id="data-id">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="UbahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Stok</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form action="" method="post" class="needs-validation" id="form-ubah">
                @csrf @method('PATCH')
                <input type="hidden" name="id_stok" id="idstok">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="idbahanbaku">Nama Bahanbaku</label>
                            <select id="idbahanbaku" name="bahan_baku_id" class="form-control bahan_baku_id" required>
                                
                                <option value="">--- Pilih Nama Bahanbaku ---</option>
                                @foreach ($bahan_baku as $item)
                                    <option value="{{$item['id']}}">{{$item['nama']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="tglbeli">Tanggal Beli (Bulan/Hari/Tahun)</label>
                            <input type="date" class="form-control tgl_beli" placeholder="Masukkan tanggal beli" aria-describedby="inputGroupPrepend" name="tgl_beli" required>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="tglkadaluarsa">Tanggal Kadaluarsa (Bulan/Hari/Tahun)</label>
                            <input type="date" class="form-control tgl_kadaluarsa" id="tglkadaluarsa" placeholder="Masukkan tanggal kadaluarsa" aria-describedby="inputGroupPrepend" name="tgl_kadaluarsa" required>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="jumlahbeli">Jumlah</label>
                            <input type="number" min="0" class="form-control jumlah" id="jumlahbeli" placeholder="Masukkan jumlah beli" aria-describedby="inputGroupPrepend" name="jumlah_beli" required>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="sisa">Sisa Stok</label>
                            <input type="number" min="0" class="form-control sisa" id="sisa" placeholder="Masukkan sisa stok" aria-describedby="inputGroupPrepend" name="sisa" required>
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
        $(document).ready(function() {
            $('.hapus').click(function(){
                var id = $(this).data('id');
                var url = "{{url('/stok')}}" + '/' + id;
                $('#form-hapus').attr('action', url);
                $('.nama').html($(this).data('nama'));
                $('.tgl').html($(this).data('tgl'));
            });
            $('.ubah').click(function(){
                var id = $(this).data('id');
                var url = "{{url('/stok')}}" + '/' + id;
                $('#form-ubah').attr('action', url);
                $('.bahan_baku_id').val($(this).data('nama')).change();
                $('.tgl_beli').val($(this).data('tgl_beli'));
                $('.tgl_kadaluarsa').val($(this).data('tgl_kadaluarsa'));
                $('.sisa').val($(this).data('sisa'));
                $('.jumlah').val($(this).data('jumlah'));
            });
        });
    </script>
    @endsection