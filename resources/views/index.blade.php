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
                        <div>Dashboard
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Jumlah Penjualan</div>
                                        <div class="widget-subheading">Penjualan</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>{{$transaksi}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Jumlah Menu</div>
                                        <div class="widget-subheading">Menu</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>{{$menu}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-grow-early">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Jumlah User</div>
                                        <div class="widget-subheading">User</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>{{$user}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                        <div class="widget-chat-wrapper-outer">
                            <h5 class="text-center m-3">Grafik Penjualan</h5>
                            <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <canvas id="canvass" width="610" height="304" style="display: block; height: 203px; width: 407px;" class="chartjs-render-monitor"></canvas>
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

@section('script')
<script>
    var ctx = document.getElementById('canvass').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        maintainAspectRatio: false,
        responsive: true,
// The data for our dataset
        data: {
            labels:  {!!json_encode($chart['minggu'])!!} ,
            datasets: [
                <?php foreach($chart['terjual'] as $key => $item) {?>
                {
                    label: {!!json_encode($chart['menu'][$key-1])!!},
                    backgroundColor: {!!json_encode($chart['warna'][$key-1])!!} ,
                    data:  {!! json_encode($item)!!} ,
                },
                <?php } ?>
            ]
        },
// Configuration options go here
        options: {
            scaleShowValues: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value) {if (value % 1 === 0) {return value;}}
                    },
                    scaleLabel: {
                        display: false
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }]
            },
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding:25,
                    boxWidth: 25,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 100,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });
</script>
    
@endsection