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
                    <div>Kasir
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <button href="" class="btn-shadow btn btn-success" data-target="#dataKeranjang"
                            data-toggle="modal">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-shopping-cart"> </i>
                            </span>
                            Keranjang Belanja
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h3 class="card-title">Daftar Menu</h3>
                        <div class="row">
                        @foreach ($data as $item)

                            <div class="col-md-4">  
                                <div class="main-card mb-3 card"><img width="100%" src="{{asset($item->gambar)}}" alt="Card image cap" class="card-img-top">
                                    <div class="card-body"><h5 class="card-title">{{$item->nama}}</h5><h6 class="card-subtitle">Rp. {{number_format($item->harga)}}</h6>
                                        <button class="btn btn-primary keranjang"  data-target="#tambahKeranjang" data-toggle="modal" data-nama="{{$item->nama}}" data-id="{{$item->id}}" data-harga="{{$item->harga}}" data-stok="{{$item->stok}}"><i class="fa fa-shopping-cart"></i></button>
                                        <button class="btn btn-warning" data-target=".resep{{$item->id}}" data-toggle="modal"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                        </div>
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

<div class="modal fade" id="tambahKeranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Ke Keranjang</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form action="{{route('penjualan.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="id">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="nama">Nama Menu</label>
                            <input type="text" class="form-control bg-white" id="nama" placeholder="Masukkan nama menu" aria-describedby="inputGroupPrepend" name="nama" readonly>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="harga">Harga Menu</label>
                            <input type="number" class="form-control bg-white" min="1" id="harga" placeholder="Masukkan harga menu" aria-describedby="inputGroupPrepend" name="harga" readonly>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control bg-white" min="1" id="stok" placeholder="Masukkan harga menu" aria-describedby="inputGroupPrepend" name="stok" readonly>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="jumlah">Jumlah Porsi</label>
                            <input type="number" class="form-control bg-white" min="1" id="jumlah" placeholder="Masukkan jumlah pembelian menu" aria-describedby="inputGroupPrepend" name="jumlah" required>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submitKeranjang">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="dataKeranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Keranjang</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form action="{{route('penjualan.add')}}" method="post" enctype="multipart/form-data">
                @csrf
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
                                            <th style="width: 90px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; $total = 0;
                                        foreach ($keranjang as $k) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td>
                                                    <?= $k->menu->nama ?>
                                                    <input type="hidden" name="menu_id[]" value="<?= $k->menu_id ?>">
                                                </td>
                                                <td>
                                                    <?= $k->qty ?>
                                                    <input type="hidden" name="qty[]" value="<?= $k->qty ?>">
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($k->status == 1) {
                                                        echo "Pesanan Diproses";
                                                    }
                                                    if ($k->status == 2) {
                                                        echo "Pesanan Selesai";
                                                    }
                                                    ?>
                                                    <input type="hidden" name="status[]" value="<?= $k->status ?>">
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-xs btn-rounded btn-danger text-light" data-toggle="tooltip" data-placement="top" data-original-title="Hapus Menu" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="{{url('/penjualan/delete/'.$k->id)}}"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <?php $total+=$k->menu->harga;?>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="tgl_trans">Tanggal Transaksi</label>
                            <input type="date" class="form-control" id="tgl_trans" placeholder="Masukkan tanggal transaksi" aria-describedby="inputGroupPrepend" name="tgl_trans" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="nomeja">Nomor Meja</label>
                            <input type="number" min="1" class="form-control" id="nomeja" placeholder="Masukkan nomor meja" aria-describedby="inputGroupPrepend" name="no_meja" value="" required>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="total">Total</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" min="1" class="form-control bg-white" id="total" placeholder="Masukkan total belanja" aria-describedby="inputGroupPrepend" name="total" value="<?= $total ?>" readonly>
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
                                <input type="number" class="form-control bg-white" id="kembali" min="1" placeholder="Nominal kembalian" aria-describedby="inputGroupPrepend" name="kembali" value="" readonly>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="status">Status Pembayaran</label>
                            <select class="form-control" id="status" aria-describedby="inputGroupPrepend" name="status" required>
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

@foreach ($data as $item)
<div class="modal fade resep{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Resep {{$item->nama}}</h5>
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <div class="modal-body">
            <ol>
            @if ($item->resep->isEmpty())
                Belum ada resep
            @else
            @foreach ($item->resep as $resep)    
                <li>
                    {{$resep->bahan_baku->nama}}
                </li>
            @endforeach
            @endif
            </ol>
        </div>
      </div>
    </div>
  </div>
@endforeach

    @section('script')
    <script>
        $(document).ready(function() {
            $('.keranjang').click(function(){
                console.log('oke');
                if($(this).data('stok') === 0 ){
                    $('#submitKeranjang').attr("class", "btn btn-danger");
                    $('#submitKeranjang').attr("disabled", true);
                    document.getElementById('submitKeranjang').innerHTML = "Stok Habis !";
                }else{
                    $('#submitKeranjang').attr("class", "btn btn-success");
                    $('#submitKeranjang').attr("disabled", false);
                    document.getElementById('submitKeranjang').innerHTML = "Simpan";

                }
                $('#id').val($(this).data('id'));
                $('#nama').val($(this).data('nama'));
                $('#stok').val($(this).data('stok'));
                $('#harga').val($(this).data('harga'));
        });
                $('#bayar').on('input', function() {
                    var bayar = $('#bayar').val();
                    var total = parseInt($('#total').val());

                    var kembalian = bayar - total;
                    $('#kembali').attr("value", kembalian);
                    if(kembalian < 0){
                        $('#tambah').attr("disabled", true);
                    }else{
                        $('#tambah').attr("disabled", false);
                    }
                });
        });
    </script>
    @endsection