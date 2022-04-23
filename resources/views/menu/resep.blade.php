@extends('layouts.master')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Menu
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Resep</h5>
                        <br>
                        <select name="menu" id="daftar_menu" class="form-control show-tick" required>
                            <option value="0">-- Pilih Menu --</option>
                            @foreach ($menu as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                        <br>
                        <table class="mb-0 table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bahan Baku</th>
                                    <th>Takaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="data">
                                
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
          <h5 class="modal-title" id="HapusDataLabel">Hapus Data <span class="nama-resep"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="form-hapus" method="POST">
              @csrf @method('DELETE')
              Apakah Anda Yakin Ingin Menghapus Menu <span class="nama-resep"></span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Hapus</button>
          </form>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="tambahResep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Resep</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form action="{{route('resep.store')}}" method="post" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="modal-body">
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
                        <input type="hidden" name="menu_id" id="menu_id">
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

<div class="modal fade" id="editMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Resep</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form action="" method="post" enctype="multipart/form-data" class="needs-validation" id="form-ubah">
                @csrf @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="nama_menu">Nama Bahan Baku</label>
                            <select class="form-control" id="bahan_baku" aria-describedby="inputGroupPrepend" name="bahan_baku" required>
                                <option value="">--- Pilih Bahanbaku ---</option>
                                @foreach ($bahan_baku as $item)
                                <option value="{{$item['id']}}">{{$item['nama']}}</option>    
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="takaran">Takaran</label>
                            <input type="number" class="form-control " min="1" id="takaranUbah" placeholder="Masukkan Jumlah Takaran" aria-describedby="inputGroupPrepend" name="takaran" required>
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
    $(document).ready(function () {

        $('#daftar_menu').change(function () {
            var id = $("#daftar_menu").val();
            var url = "{{url('/resep')}}" + '/' + id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                dataType: 'text',
                url: url,
                data: { '_token': $('input[name=_token]').val() },
                success: function (data) {
                    console.log(data);
                    $('.data').html(data);
                    $('.tambahResep').click(function(){
                            var id = $(this).data('id');
                            $('#menu_id').val(id);
                    });
                    $('.hapus').click(function(){
                        var id = $(this).data('id');
                        var url = "{{url('/resep')}}" + '/' + id;
                        $('#form-hapus').attr('action', url);
                        $('.nama-resep').html($(this).data('nama'));
                    });
                    $('.editMenu').click(function(){
                        var id = $(this).data('id');
                        var url = "{{url('/resep')}}" + '/' + id;
                        $('#form-ubah').attr('action', url);
                        $('#bahan_baku').val($(this).data('bahan')).change();
                        $('#takaranUbah').val($(this).data('takaran'));
                    });
                }
            }).done(function (data) {
                console.log('suksess');
            });
        });
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
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
                ); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })

        
    });
</script>
@endsection