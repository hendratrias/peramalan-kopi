@extends('layouts.master')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-id icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Users
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
                        <div class="row">
                            <div class="col-md-3" style="min-height: 330px">
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="{{asset($data->foto)}}" alt="User profile picture" style="width: 90%">
                                        </div>
            
                                        <h3 class="profile-username text-center" style="font-size: 25px">{{$data->name}}</h3>
            
                                        <p class="text-muted text-center" style="font-size: 20px">{{$data->role->posisi}}</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
            
                            <div class="col-md-9" style="min-height: 330px">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="tabs-animated-shadow tabs-animated nav">
                                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Update Profile</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#change-password" data-toggle="tab">Ubah Password</a></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="settings">
                                                <form class="form-horizontal" action="{{route('user.update' , $data->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="foto_old" value="{{$data->foto}}">
                                                    <input type="hidden" name="role_id" value="{{$data->role_id}}">
                                                    <div class="form-group row">
                                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama" value="{{$data->name}}" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{$data->username}}" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto Profile"  accept="image/png, image/gif, image/jpeg">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
            
                                            <div class="tab-pane" id="change-password">
                                                <form class="form-horizontal" action="{{route('user.change_password' , $data->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf @method('PATCH')
                                                    <div class="form-group row">
                                                        <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                                                        <div class="col-sm-10">
                                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
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