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
                    <div>Penjualan
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h3 class="card-title">Daftar Transaksi</h3>
                        <table class="mb-0 table table-hover" id="dataTables">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nomor Meja</th>
                                    <th>Kasir</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$item->tgl_trans}}</td>
                                    <td>{{$item->no_meja}}</td>
                                    <td>{{($item->user_id)? $item->users->name : ""}}</td>
                                    <td>{!!($item->status == 2) ? "<div class='badge badge-success'>Sudah Dibayar</div>" : "<div class='badge badge-warning'>Belum DIbayar</div>"!!}</td>
                                    <td>
                                        <button href="" class="btn btn-lg btn-warning text-white editTransaksi"  data-toggle="modal" data-target="#editTransaksi" data-id="{{$item->id}}" data-tgl_trans="{{$item->tgl_trans}}" data-no_meja={{$item->no_meja}} data-status="{{$item->status}}" data-total={{$item->total}} data-bayar="{{$item->bayar}}" data-kembali="{{$item->kembali}}"><i class="fa fa-edit"></i></button>
                                        <button type="button"  class="btn btn-lg btn-danger text-white hapus" data-id="{{$item->id}}" data-tgl="{{$item->tgl_trans}}" data-toggle="modal" data-target="#HapusData" data-id=""><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                        {{ $data->links() }}
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

<div class="modal fade" id="editTransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Keranjang</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form action="" method="post" id="form-ubah" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="table-responsive">
                                <table id="" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Menu</th>
                                            <th>Qty</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelDetailTrans">
                                    
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="tgl_trans">Tanggal Transaksi</label>
                            <input type="date" class="form-control" id="tgl_trans" placeholder="Masukkan tanggal transaksi" aria-describedby="inputGroupPrepend" name="tgl_trans" value="" required>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="no_meja">Nomor Meja</label>
                            <input type="number" min="1" class="form-control" id="no_meja" placeholder="Masukkan nomor meja" aria-describedby="inputGroupPrepend" name="no_meja" value="" required>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="total">Total</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" min="1" class="form-control bg-white" id="total" placeholder="Masukkan total belanja" aria-describedby="inputGroupPrepend" name="total" value="" readonly>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="bayar">Bayar</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" class="form-control" id="bayar" placeholder="Nominal bayar" aria-describedby="inputGroupPrepend" name="bayar" value="" required>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="kembali">Kembalian</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" class="form-control bg-white kembalii" id="kembali" min="1" placeholder="Nominal kembalian" aria-describedby="inputGroupPrepend" name="kembali" value="" readonly>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="status">Status Pembayaran</label>
                            <select class="form-control" id="status" aria-describedby="inputGroupPrepend" name="status_transaksi" required>
                                <option value="">Pilih Status</option>
                                <option value="1">Belum Bayar</option>
                                <option value="2">Sudah Bayar</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="tambah">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="HapusData" tabindex="-1" role="dialog" aria-labelledby="HapusDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="HapusDataLabel">Hapus Data Tanggal <span class="nama-resep"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-hapus" method="POST">
              @csrf @method('DELETE')
              Apakah Anda Yakin Ingin Menghapus Menu Tanggal <span class="nama-resep"></span>
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
        $(document).ready(function() {
            $('#dataTables').DataTable({
                "paging":   false,
            });
            $('.editTransaksi').on('click', function() {
                var id = $(this).data('id');
                var url = "{{url('/penjualan')}}" + '/' + id;
                $('#form-ubah').attr('action', url);
                $.get("{{url('/penjualan/transaksi')}}"+ '/' + id, function(msg) {
                    $('#tabelDetailTrans').html(msg);
                });
                $('#tgl_trans').val($(this).data('tgl_trans'));
                $('#no_meja').val($(this).data('no_meja'));
                $('#total').val($(this).data('total'));
                $('#bayar').val($(this).data('bayar'));
                $('#status').val($(this).data('status')).change();
                $('#kembali').val($(this).data('kembali'));
                

            });
            $('#bayar').on('input', function() {
                    var bayar = $('#bayar').val();
                    var total = parseInt($('#total').val());

                    var kembalian = bayar - total;
                    $('.kembalii').val(kembalian);
                    if(kembalian < 0){
                        $('#tambah').attr("disabled", true);
                    }else{
                        $('#tambah').attr("disabled", false);
                    }
                });
                $('.hapus').click(function(){
                        var id = $(this).data('id');
                        var url = "{{url('/penjualan')}}" + '/' + id;
                        $('#form-hapus').attr('action', url);
                        $('.nama-resep').html($(this).data('tgl'));
                });
        });
    </script>
    @endsection