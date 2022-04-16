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
                    <div>Peramalan
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h3 class="card-title">Buat Peramalan</h3>
                        <br><br>
                        <form action="{{url('/peramalan/hitung/')}}" method="POST">
                            @csrf
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="nama_menu">Nama Menu</label>
                            <select name="nama_menu" id="nama_menu" class="form-control show-tick" required="">
                                <option value="">-- Pilih Menu --</option>
                                @foreach ($menu as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="periode">Periode</label>
                            <select name="periode" id="periode" class="form-control show-tick" required="">
                                <option value="">-- Pilih Periode --</option>
                                @php
                                    $x = 0;
                                    $now = date('Y-m-d');
                                    $date = "2020-11-03";
                                    $tanggal_akhir = date('Y-m-d', strtotime("+7 day", strtotime($tgl_terakhir->tgl_trans)));    
                                @endphp
                                @while ($date < $tanggal_akhir)
                                @php                                    
                                    $awal = "2020-11-03";
                                    $date = date("Y-m-d", strtotime("+" . $x . " week", strtotime($awal)));
                                    $date2 = date("Y-m-d", strtotime("+6 day", strtotime($date)));
                                    $x++;
                                    @endphp
                                <option value="{{$date}}">{{$date}} - {{$date2}} </option>
                                @endwhile
                            </select>
                        </div>
                        <br>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
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