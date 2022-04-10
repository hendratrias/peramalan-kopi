<?php
namespace App\Repositories;

use App\Peramalan;
use DB;

class PeramalanRepository
{
    public function findAll()
    {
        $data = Peramalan::get();
        return $data;
    }

    public function create($params)
    {
        try {
            $data = Peramalan::create($params);
            $data->save();
        } catch (\Throwable $e) {
            alert()->error('Peramalan Gagal Ditambahkan', 'Peramalan');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $data = Peramalan::findOrFail($id);
        try {
            $data->delete();
        } catch (\Throwable $e) {
            alert()->error('Peramalan Gagal Dihapus', 'Peramalan');
            return redirect()->back();
        }
    }

    public function get_sum($id)
    {
        try {
            $data = DB::table('menu')
                ->join('resep', 'resep.menu_id', '=', 'menu.id')
                ->join('bahan_baku', 'resep.bahan_baku_id', '=', 'bahan_baku.id')
                ->where('menu.id', $id)
                ->where('bahan_baku.jenis', 1)
                ->sum('resep.takaran');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
        return $data;
    }

    public function hitung($id)
    {
        try {
            $data = DB::table("detail_transaksi")
                ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
                ->select(DB::raw('WEEK(transaksi.tgl_trans) as `minggu`'), DB::raw('MONTH(transaksi.tgl_trans) as `bulan`'), DB::raw('YEAR(transaksi.tgl_trans) as `tahun`'), DB::raw('SUM(qty) as `terjual`'))
                ->groupby(['tahun', 'bulan', 'minggu'])
                ->where('menu_id', '=', $id)
                ->get();
            $peramalan = self::bobot($id);
            return $peramalan;
        } catch (\Throwable $th) {
            alert()->warning('Peramalan Tidak Ditemukan', 'Peramalan');
            return redirect()->back();
        }

    }

    public function bobot($id)
    {
        $sort = 1000;
        $mape = [2, 5, 7, 9];
        $peramalan = array();
        $hasil_mape = array();
        $pe = array();
        $key = 0;
        $perbandingan = 0;
        $result = array();
        $minggu = self::minggu();
        foreach ($mape as $data) {
            $hasil = self::perhitungan($data, $id);
            $peramalan[$data] = $hasil;

        }
        foreach ($peramalan[9]['mape'] as $cek) {
            $sort = 1000;
            foreach ($mape as $bobot) {
                $perbandingan = $peramalan[$bobot]['mape'][$key + 9 - $bobot];
                if ($perbandingan < $sort) {
                    $result['mape'][$key] = $perbandingan;
                    $result['pe'][$key] = $peramalan[$bobot]['pe'][$key + 9 - $bobot];
                    $result['peramalan'][$key] = $peramalan[$bobot]['peramalan'][$key + 10 - $bobot];
                    $result['bobot'][$key] = $bobot;
                    $result['aktual'][$key] = $peramalan[$bobot]['aktual'][$key + $bobot];
                    $sort = $perbandingan;
                    $result['minggu'][$minggu[$key + 9]] = [
                        'bobot' => $bobot,
                        'peramalan' => $peramalan[$bobot]['peramalan'][$key + 10 - $bobot],
                        'mape' => $perbandingan,
                        'aktual' => $result['aktual'][$key],
                    ];
                }
            }
            $key++;
        }
        return ['peramalan' => $peramalan, 'rekomendasi' => $result, 'minggu' => self::minggu()];
    }
    public function perhitungan($bobot, $id)
    {
        $data_latih = DB::table("detail_transaksi")
            ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            ->select(DB::raw('WEEK(transaksi.tgl_trans) as `minggu`'), DB::raw('MONTH(transaksi.tgl_trans) as `bulan`'), DB::raw('YEAR(transaksi.tgl_trans) as `tahun`'), DB::raw('SUM(qty) as `terjual`'))
            ->groupby(['tahun', 'bulan', 'minggu'])
            ->where('menu_id', '=', $id)
            ->orderBy('tahun', 'asc', 'bulan')
            ->get();
        $data = array();
        $peramalan = array();
        $pe = array();
        $mape = array();
        $hitung = 0;
        $jumlah = 0;
        $sse = 0;
        $total_pe = 0;

        foreach ($data_latih as $terjual) {
            $data[] = $terjual->terjual;
        }

        for ($i = 0; $i <= count($data_latih) - $bobot; $i++) {
            for ($j = 0; $j < $bobot; $j++) {
                $jumlah += $data[$i + $j];
            }

            $peramalan[] = $jumlah / $bobot;
            $jumlah = 0;
        }
        for ($i = 0; $i < count($peramalan) - 1; $i++) {
            $mse[] = pow(($data[$i + $bobot] - $peramalan[$i]), 2);
        }
        for ($i = 0; $i < count($peramalan) - 1; $i++) {
            $pe[] = round(abs(($data[$i + $bobot] - $peramalan[$i]) / $data[$i + $bobot]) * 100);
        }
        for ($i = 0; $i < count($pe); $i++) {
            for ($j = 0; $j <= $i; $j++) {
                $hitung += $pe[$j];
            }
            $mape[] = $hitung / ($i + 1);
            $hitung = 0;
        }
        foreach ($mse as $item) {
            $sse += $item;
        }
        foreach ($pe as $item) {
            $total_pe += $item;
        }
        $average_pe = $total_pe / count($pe);
        $average_mse = $sse / count($mse);
        $hasil = ['peramalan' => $peramalan, 'pe' => $pe, 'mape' => $mape, 'mse' => $mse, 'sse' => $sse, 'average_mse' => $average_mse, 'average_pe' => round($average_pe), 'aktual' => $data];
        return $hasil;

    }

    public function minggu()
    {
        $data = DB::table("detail_transaksi")
            ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            ->select(DB::raw('WEEK(transaksi.tgl_trans) as `minggu`'), DB::raw('MONTH(transaksi.tgl_trans) as `bulan`'), DB::raw('YEAR(transaksi.tgl_trans) as `tahun`'), DB::raw('SUM(qty) as `terjual`'))
            ->groupby(['tahun', 'bulan', 'minggu'])
            ->get();

        $minggu = array();
        $date = '2020-09-05';
        foreach ($data as $items) {
            $minggu[] = $date;
            $date = date('Y-m-d', strtotime('+1 week', strtotime($date)));
        }
        $minggu = $minggu;
        return $minggu;
    }

}
