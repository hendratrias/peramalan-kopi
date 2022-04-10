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
                    <div>Hasil Peramalan
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h4>Rekomendasi Hasil Peramalan dengan MAPE Terkecil</h4>
                        <br>
                        <div class="table-responsive">
                            <table id="" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Periode</th>
                                        <th>Hasil</th>
                                        <th>PE</th>
                                        <th>MAPE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>{{$periode}} - {{date("Y-m-d", strtotime("+6 day", strtotime($periode)))}}</th>
                                        <th>{{$data['rekomendasi']['minggu'][$periode]['peramalan']}}</th>
                                        <th>-</th>
                                        <th>{{$data['rekomendasi']['minggu'][$periode]['mape']}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h4>Kesimpulan :</h4>
                        <ul>
                            <li>Metode peramalan terbaik adalah <em><strong>Single Moving Average dengan bobot {{$data['rekomendasi']['minggu'][$periode]['bobot']}}</strong></em> dengan perolehan MAPE <strong>{{$data['rekomendasi']['minggu'][$periode]['mape']}}</strong></li>
                            <li>Hasil peramalan penjualan adalah <strong> {{$data['rekomendasi']['minggu'][$periode]['peramalan']}} </strong></li>
                            <li>Hasil perkiraan penyediaan stok kopi untuk menu <strong>{{$menu->nama}}</strong> adalah {{$data['rekomendasi']['minggu'][$periode]['peramalan']}} * {{$sum}} =  {{($data['rekomendasi']['minggu'][$periode]['peramalan'] * $sum)}} gram</li>
                        </ul>
                    </div>
                    <div class="card-body border-top text-right">
                        <form method="post" action="{{route('peramalan.store')}}">
                            @csrf
                            <a href="{{route('peramalan.index')}}?>" class="btn btn-danger">Kembali</a>
                            <input type="hidden" name="tgl" value="<?= date('Y-m-d') ?>">
                            <input type="hidden" name="periode" value="{{$periode}}">
                            <input type="hidden" name="metode" value="Single Moving Average {{$data['rekomendasi']['minggu'][$periode]['bobot']}}">
                            <input type="hidden" name="hasil" value="{{$data['rekomendasi']['minggu'][$periode]['peramalan']}}">
                            <input type="hidden" name="rekomendasi_stok" value="{{($data['rekomendasi']['minggu'][$periode]['peramalan'] * $sum)}}">
                            <input type="hidden" name="MAPE" value="{{$data['rekomendasi']['minggu'][$periode]['mape']}}">
                            <input type="hidden" name="aktual" value="{{$data['rekomendasi']['minggu'][$periode]['aktual']}}">
                            <input type="hidden" name="menu_id" value="{{$menu->id}}">
                            <input type="hidden" name="bahan_baku_id" value="{{$menu->id}}">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h4>Detail Peramalan</h4>
                            <div id="accordion" class="accordion-wrapper mb-3">
                                @foreach ($data['peramalan'] as $key=> $item)
                                <div class="card">
                                    <div id="heading{{$key}}" class="card-header">
                                        <button type="button" data-toggle="collapse" data-target="#collapse{{$key}}1" aria-expanded="false" aria-controls="collapse{{$key}}" class="text-left m-0 p-0 btn btn-link btn-block collapsed">
                                            <h5 class="m-0 p-0">Single Moving Average {{$key}}</h5>
                                        </button>
                                    </div>
                                    <div data-parent="#accordion" id="collapse{{$key}}1" aria-labelledby="heading{{$key}}" class="collapse" style="">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="ses" class="table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Periode</th>
                                                            <th>Aktual</th>
                                                            <th>Hasil</th>
                                                            <th>PE</th>
                                                            <th>MAPE</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($item['aktual'] as $index => $items)    
                                                            <tr>
                                                                <td>{{$data['minggu'][$index]}} - {{date("Y-m-d", strtotime("+6 day", strtotime($data['minggu'][$index])))}}</td>
                                                                <td>{{$items}}</td>
                                                                @if ($index >= ($key-1))
                                                                    <td>{{$item['peramalan'][$index+1-$key]}}</td>
                                                                @else
                                                                    <td>-</td>
                                                                @endif
                                                                @if ($index >= ($key-1))
                                                                    @if ($index < count($item['peramalan']))    
                                                                        <td>{{$item['pe'][$index+1-$key]}}</td>
                                                                    @else
                                                                    <td>-</td>
                                                                    @endif
                                                                @else
                                                                    <td>-</td>
                                                                @endif
                                                                @if ($index > ($key-1))
                                                                <td>{{$item['mape'][$index-$key]}}</td>
                                                                @else
                                                                <td>-</td>
                                                                @endif
                                                                <td></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{-- <div class="card">
                                    <div id="headingTwo" class="b-radius-0 card-header">
                                        <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block collapsed"><h5 class="m-0 p-0">Collapsible Group Item
                                            #2</h5></button>
                                    </div>
                                    <div data-parent="#accordion" id="collapseOne2" class="collapse" style="">
                                        <div class="card-body">2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                            nesciunt
                                            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                            sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                                            VHS.
                                        </div>
                                    </div>
                                </div> --}}
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