<?php

namespace App\Repositories;

use App\DetailTransaksi;
use App\Transaksi;

class TransaksiRepository
{
    public function get_keranjang()
    {
        $data = DetailTransaksi::where('transaksi_id', null)->get();
        return $data;
    }

    public function create_keranjang($params)
    {
        try {
            $data = DetailTransaksi::create($params);
            $data->save();
        } catch (\Throwable $e) {
            alert()->error('Produk Gagal Ditambah ke Keranjang', 'Keranjang');
            return redirect()->back();
        }
        return $data;
    }

    public function create_transaksi($params)
    {
        try {
            $data = Transaksi::create($params);
            $data->save();
        } catch (\Throwable $e) {
            alert()->error('Transaksi Gagal Ditambah', 'Transaksi');
            return redirect()->back();
        }
        return $data;
    }

    public function find_keranjang($id)
    {
        $data = DetailTransaksi::where([['menu_id', "=", $id], ['status', '=', 1], ['transaksi_id', '=', null]])->get();
        return $data;
    }

    public function update_keranjang($id = null, $params)
    {
        if ($id !== null) {
            $data = DetailTransaksi::findOrFail($id);
            $data->update($params);
        } else {
            $data = DetailTransaksi::where('transaksi_id', null)->update(['transaksi_id' => $params]);
        }

    }

    public function delete_keranjang($id)
    {
        $data = DetailTransaksi::findOrFail($id);
        try {
            $data->delete();
        } catch (\Throwable $e) {
            alert()->error('Produk Gagal Dihapus dari Keranjang', 'Keranjang');
            return redirect()->back();
        }
    }
    public function delete_transaksi($id)
    {
        $data = Transaksi::findOrFail($id);
        try {
            $data->delete();
        } catch (\Throwable $e) {
            alert()->error('Transaksi Gagal Dihapus', 'Transaksi');
            return redirect()->back();
        }
    }

    public function get_transaksi()
    {
        $data = Transaksi::orderBy('id', 'DESC')->get();
        return $data;
    }
    public function get_transaksi_with_pagination()
    {
        $data = Transaksi::orderBy('id', 'DESC')->paginate(20);
        return $data;
    }

    public function find_transaksi($id)
    {
        $data = DetailTransaksi::where('transaksi_id', $id)->get();
        return $data;
    }

}
