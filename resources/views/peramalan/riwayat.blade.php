@extends('layouts.master')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Riwayat Peramalan
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h3 class="card-title">Daftar Transaksi</h3>
                        <table class="mb-0 table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Tanggal</th>
                                    <th>Periode</th>
                                    <th>Metode</th>
                                    <th>Hasil</th>
                                    <th>Mape</th>
                                    @if (auth()->user()->role->id === 1)
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$item->menu->nama}}</td>
                                    <td>{{$item->tgl}}</td>
                                    <td>{{$item->periode}}</td>
                                    <td>{{$item->metode}}</td>
                                    <td>{{$item->hasil}}</td>
                                    <td>{{$item->MAPE}}</td>
                                    <td>
                                        @if (auth()->user()->role->id === 1)
                                        <button type="button"  class="btn btn-lg btn-danger text-white hapus" data-id="{{$item->id}}" data-tgl="{{$item->tgl}}" data-toggle="modal" data-target="#HapusData"><i class="fa fa-trash"></i></button>
                                        @endif
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
          <h5 class="modal-title" id="HapusDataLabel">Hapus Peramalan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-hapus" method="POST">
              @csrf @method('DELETE')
              Apakah Anda Yakin Ingin Menghapus Peramalan Tanggal <span class="tgl-peramalan"></span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Hapus</button>
          </form>
        </div>
      </div>
    </div>
</div>

@section('script')
    <script>
        $('.hapus').click(function(){
                        var id = $(this).data('id');
                        var url = "{{url('/peramalan')}}" + '/' + id;
                        $('#form-hapus').attr('action', url);
                        $('.tgl-peramalan').html($(this).data('tgl'));
                });
    </script>
@endsection