<?php

namespace App\Http\Controllers;

use App\DetailTransaksi;
use App\Repositories\MenuRepository;
use App\Repositories\StokRepository;
use App\Repositories\TransaksiRepository;
use App\Transaksi;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

    public function __construct(MenuRepository $menu, StokRepository $stok, TransaksiRepository $transaksi)
    {
        $this->menu = $menu;
        $this->stok = $stok;
        $this->transaksi = $transaksi;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penjualan.index');
    }

    public function riwayat()
    {
        $data = $this->transaksi->get_transaksi_with_pagination();
        return view('penjualan.riwayat', compact('data'));
    }

    public function kasir()
    {
        $data = $this->menu->findAll();
        $keranjang = $this->transaksi->get_keranjang();
        foreach ($data as $item) {
            $stok = $this->stok->getStok($item->id);
            $item->stok = $stok;
        }
        return view('penjualan.kasir', compact('data', 'keranjang'));
    }

    public function transaksi()
    {
        $data = $this->transaksi->get_transaksi();
        return view('penjualan.transaksi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = $this->transaksi->find_keranjang($request->id);
        if ($check->isNotEmpty()) {
            $qty = $check[0]->qty + $request->jumlah;
            $stok = $this->stok->getStok($request->id);
            if ($qty > $stok) {
                alert()->warning('Stok Kurang Silahkan hapus produk dikeranjang', 'Stok Kurang');
                return redirect()->back();
            }
            $params = [
                'qty' => $qty,
            ];
            $this->transaksi->update_keranjang($check[0]->id, $params);
        } else {
            $params = [
                'transaksi_id' => null,
                'menu_id' => (int) $request->id,
                'qty' => (int) $request->jumlah,
                'status' => 1,
            ];
            $this->transaksi->create_keranjang($params);
        }
        alert()->success('Produk Berhasil Dimasukkan Keranjang', 'Keranjang');
        return redirect()->back();
    }

    public function add(Request $request)
    {
        $params = [
            'tgl_trans' => $request->tgl_trans,
            'total' => $request->total,
            'bayar' => $request->bayar,
            'kembali' => ($request->kembali === null) ? 0 : $request->kembali,
            'no_meja' => $request->no_meja,
            'status' => $request->status,
            'user_id' => auth()->user()->id,
        ];
        $transaksi = $this->transaksi->create_transaksi($params);
        $this->transaksi->update_keranjang(null, $transaksi->id);
        foreach ($request->menu_id as $key => $item) {
            $this->stok->update_stok($item, $request->qty[$key]);
        }
        alert()->success('Transaksi Berhasil Ditambahkan', 'Transaksi');
        return redirect()->back();
    }

    public function delete_keranjang($id)
    {
        $this->transaksi->delete_keranjang($id);
        alert()->success('Produk Berhasil Dihapus dari Keranjang', 'Keranjang');
        return redirect()->back();
    }

    public function get_transaksi($id)
    {
        $data = $this->transaksi->find_transaksi($id);
        // return $data;
        $response = "";
        $confirm = "return confirm('Apakah anda yakin ingin mengubah status data ini ?')";
        foreach ($data as $key => $item) {
            if ($item->status === 1) {
                $option1 = "selected";
                $option2 = "";
            } else {
                $option1 = "";
                $option2 = "selected";
            }
            $response .= '<tr>
                <td>
                    ' . ($key + 1) . '
                    <input type="hidden" name="transaksi_id[' . $item->id . ']" value="' . $item->id . '">
                </td>
                <td>' . $item->menu->nama . '</td>
                <td>' . $item->qty . '</td>
                <td>' . '
                    <select class="form-control" id="status" aria-describedby="inputGroupPrepend" name="status[' . $item->id . ']" required>
                        <option value="">Pilih Status</option>
                        <option value="1" ' . $option1 . '>Diproses</option>
                        <option value="2" ' . $option2 . '>Selesai</option>
                    </select>
                </td>
            </tr>';
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        foreach ($request->transaksi_id as $key => $item) {
            $data = DetailTransaksi::find((int) $item);
            $data->status = (int) $request->status[$key];
            $data->save();
        }

        $params = [
            'tgl_trans' => $request->tgl_trans,
            'total' => $request->total,
            'bayar' => $request->bayar,
            'kembali' => ($request->kembali === null) ? 0 : $request->kembali,
            'no_meja' => $request->no_meja,
            'status' => $request->status_transaksi,
        ];

        $data = Transaksi::find($id);
        $data->update($params);
        $data->save();
        alert()->success('Transaksi Berhasil Diupdate', 'Transaksi');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->transaksi->delete_transaksi($id);
        alert()->success('Transaksi Berhasil Dihapus', 'Transaksi');
        return redirect()->back();
    }
}
