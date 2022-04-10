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
                        <table class="mb-0 table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>ID Transaksi</th>
                                    <th>Nama Transaksi</th>
                                    <th>Pemasukan</th>
                                    <th>Petugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>
                                        <a href="" class="btn btn-lg btn-warning text-white"><i class="fa fa-edit"></i></a>
                                        <button type="button"  class="btn btn-lg btn-danger text-white hapus"  data-toggle="modal" data-target="#HapusData" data-id=""><i class="fa fa-trash"></i></button>
                                </tr>
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
            Apakah Anda Yakin Ingin Menghapus <span class="nama"></span>
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


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="namamenu">Nama Menu</label>
                                <input type="text" class="form-control" id="namamenu" placeholder="Masukkan nama menu" aria-describedby="inputGroupPrepend" name="nama_menu" required>
                                <div class="invalid-feedback">
                                    Masukkan Nama Dengan Benar !
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="hargamenu">Harga Menu</label>
                                <input type="number" class="form-control" min="1" id="hargamenu" placeholder="Masukkan harga menu" aria-describedby="inputGroupPrepend" name="harga_menu" required>
                                <div class="invalid-feedback">
                                    Masukkan Harga Dengan Benar !
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="gambarmenu">Gambar Menu</label>
                                <input type="file" class="form-control" id="gambarmenu" placeholder="Upload gambar menu" aria-describedby="inputGroupPrepend" name="gambar" required>
                                <div class="invalid-feedback">
                                    Upload Gambar Dengan Benar !
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 input_fields_wrap">
                                <label for="resep">Resep</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" id="resep" aria-describedby="inputGroupPrepend" name="resep[]" required>
                                        <option value="">--- Pilih Bahanbaku ---</option>
                                    </select>
                                    <input type="number" class="form-control" min="1" id="takaran" placeholder="Masukkan takaran resep" aria-describedby="inputGroupPrepend" name="takaran[]" required>
                                    <a href="#" class="input-group-text input-group-append"><i class="fa fa-window-close" aria-disabled="true"></i></a>
                                    <div class="invalid-feedback">
                                        Masukkan Resep dan Takaran Dengan Benar !
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button class="add_field_button btn btn-xs btn-success" type="button"><i class="fa fa-plus"></i> Tambah Form Resep</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('script')
    <script>
        $(document).ready(function() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('' +
                        '<div class="input-group mb-3">' +
                        '<select type="number" class="form-control" id="resep" aria-describedby="inputGroupPrepend" name="resep[]" required>' +
                        '<option value="">--- Pilih Bahanbaku ---</option>' +
                        '</select>' +
                        '<input type="number" class="form-control" min="1" id="takaran" placeholder="Masukkan takaran resep" aria-describedby="inputGroupPrepend" name="takaran[]" required>' +
                        '<a href="#" class="remove_field input-group-text input-group-append"><i class="fa fa-window-close"></i></a>' +
                        '<div class="invalid-feedback">' +
                        'Masukkan Resep dan Takaran Dengan Benar !' +
                        '</div>' +
                        '</div>'
                    ); //add input box
                }
            });

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>
    @endsection