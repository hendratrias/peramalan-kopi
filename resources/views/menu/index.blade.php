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
                    <div>Menu
                    </div>
                </div>
                <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <button class="btn-shadow btn btn-info" data-target="#exampleModal" data-toggle="modal">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="pe-7s-plus"> </i>
                                </span>
                                Tambah Menu 
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
                        <h3 class="card-title">Daftar Menu</h3>
                        <table class="mb-0 table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Harga Menu</th>
                                    <th>Foto Menu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$item->nama}}</td>
                                        <td>Rp. {{number_format($item->harga, '0', '.', '.')}}</td>
                                        <td>
                                            <img width="50" height="50" src="{{asset($item->gambar)}}">
                                        </td>
                                        <td>
                                            <button class="btn btn-lg btn-warning text-white edit" data-toggle="modal" data-nama="{{$item->nama}}" data-harga="{{$item->harga}}" data-gambar="{{$item->gambar}}" data-target="#editMenu" data-id="{{$item->id}}"><i class="fa fa-edit"></i></button>
                                            <button type="button"  class="btn btn-lg btn-danger text-white hapus"  data-toggle="modal" data-nama="{{$item->nama}}"  data-target="#HapusData" data-id="{{$item->id}}"><i class="fa fa-trash"></i></button>
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
            Apakah Anda Yakin Ingin Menghapus Menu <span class="nama"></span>
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
                <form action="{{route('menu.store')}}" method="post" enctype="multipart/form-data" class="needs-validation">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="nama">Nama Menu</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama menu" aria-describedby="inputGroupPrepend" name="nama" required>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="hargamenu">Harga Menu</label>
                                <input type="text" class="form-control price" min="1" id="hargamenu" placeholder="Masukkan harga menu" aria-describedby="inputGroupPrepend" name="harga" required>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="gambarmenu">Gambar Menu</label>
                                <input type="file" class="form-control" id="gambarmenu" placeholder="Upload gambar menu" aria-describedby="inputGroupPrepend" name="gambar" required>
                            </div>

                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 input_fields_wrap">
                                <label for="resep">Resep</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" id="resep" aria-describedby="inputGroupPrepend" name="resep[]" required>
                                        <option value="">--- Pilih Bahanbaku ---</option>
                                        @foreach ($bahan_baku as $item)
                                        <option value="{{$item['id']}}">{{$item['nama']}}</option>    
                                        @endforeach
                                    </select>
                                    <input type="number" class="form-control" min="1" id="takaran" placeholder="Masukkan takaran resep" aria-describedby="inputGroupPrepend" name="takaran[]" required>
                                    <a href="#" class="input-group-text input-group-append"><i class="fa fa-window-close" aria-disabled="true"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button class="add_field_button btn btn-xs btn-success" type="button"><i class="fa fa-plus"></i> Tambah Form Resep</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-primary btn-price" onclick="change()" >Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <form action="" method="post" enctype="multipart/form-data" class="needs-validation" id="form-ubah">
                    @csrf @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="nama_menu">Nama Menu</label>
                                <input type="text" class="form-control" id="nama_menu" placeholder="Masukkan nama menu" aria-describedby="inputGroupPrepend" name="nama" required>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="harga_menu">Harga Menu</label>
                                <input type="text" class="form-control price" min="1" id="harga_menu" placeholder="Masukkan harga menu" aria-describedby="inputGroupPrepend" name="harga" required>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="gambar">Gambar Menu</label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">Gambar Lama</span></div>
                                    <input type="text" id="gambar" class="form-control" placeholder="Upload gambar menu" aria-describedby="inputGroupPrepend" name="gambarlama" readonly>
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">Gambar Baru</span></div>
                                    <input type="file" class="form-control" placeholder="Upload gambar menu" aria-describedby="inputGroupPrepend" name="gambar"  accept="image/png, image/gif, image/jpeg">
                                </div>
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
                        '<?php foreach ($bahan_baku as $bb) { ?>\n' +
                        '<option value="<?= $bb["id"] ?>"><?= $bb["nama"] ?></option>\n' +
                        '<?php } ?>' +
                        '</select>' +
                        '<input type="number" class="form-control" min="1" id="takaran" placeholder="Masukkan takaran resep" aria-describedby="inputGroupPrepend" name="takaran[]" required>' +
                        '<a href="#" class="remove_field input-group-text input-group-append"><i class="fa fa-window-close"></i></a>' +
                        '<div class="invalid-feedback">' +
                        'Masukkan Resep dan Takaran Dengan Benar !' +
                        '</div>' +
                        '</div>'
                    ); //add input boxx
                }
            });

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })

            $('.price').maskMoney({thousands:'.', decimal:','});

            $('.hapus').click(function(){
            var id = $(this).data('id');
            var url = "{{url('/menu')}}" + '/' + id;
            $('#form-hapus').attr('action', url);
            $('.nama').html($(this).data('nama'));

            });

            
            $('.edit').click(function(){
                var id = $(this).data('id');
                var url = "{{url('/menu')}}" + '/' + id;
                $('#form-ubah').attr('action', url);
                $('#id_menu').val($(this).data('id'));
                $('#nama_menu').val($(this).data('nama'));
                $('#harga_menu').val($(this).data('harga'));
                $('#gambar').val($(this).data('gambar').replace('/storage/gambar/', ''));
            });
        });
    </script>
    @endsection