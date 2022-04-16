<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Transaksi;
use App\User;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = Menu::get();
        $chart = array();
        foreach ($menu as $keys => $value) {
            $data = DB::table("detail_transaksi")
                ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
                ->select(DB::raw('WEEK(transaksi.tgl_trans) as `minggu`'), DB::raw('MONTH(transaksi.tgl_trans) as `bulan`'), DB::raw('YEAR(transaksi.tgl_trans) as `tahun`'), DB::raw('SUM(qty) as `terjual`'))
                ->groupby(['tahun', 'bulan', 'minggu'])
                ->where('menu_id', $value->id)
                ->get();
            $chart['minggu'] = array();
            $chart['menu'][] = $value->nama;
            $date = '2020-09-08';
            $chart['warna'][$keys] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
            foreach ($data as $key => $item) {
                $chart['terjual'][$value->id][$key] = $item->terjual;
                $chart['minggu'][] = $date . ' - ' . date('Y-m-d', strtotime('+1 week', strtotime($date)));
                $date = date('Y-m-d', strtotime('+1 week', strtotime($date)));
            }
        }
        $menu = count(Menu::get());
        $transaksi = count(Transaksi::get());
        $user = count(User::get());
        // dd($chart);
        return view('index', compact("menu", "transaksi", 'chart', 'user'));
    }
}
