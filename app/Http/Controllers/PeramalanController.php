<?php

namespace App\Http\Controllers;

use App\Peramalan;
use App\Repositories\MenuRepository;
use App\Repositories\PeramalanRepository;
use App\Transaksi;
use Illuminate\Http\Request;

class PeramalanController extends Controller
{

    public function __construct(PeramalanRepository $peramalan)
    {
        $this->peramalan = $peramalan;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tgl_terakhir = Transaksi::latest('tgl_trans')->first();
        $menu = (new MenuRepository)->findAll();

        return view('peramalan.index', compact('menu', 'tgl_terakhir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function hitung_peramalan(Request $request)
    {
        $sum = $this->peramalan->get_sum($request->nama_menu);
        $menu = (new MenuRepository)->find($request->nama_menu);
        $periode = $request->periode;
        $data = $this->peramalan->hitung($request->nama_menu);
        alert()->success('Peramalan Berhasil Ditemukan', 'Peramalan');
        return view('peramalan.hasil', compact('data', 'periode', 'menu', 'sum'));
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = [
            'menu_id' => $request->menu_id,
            'aktual' => $request->aktual,
            'tgl' => $request->tgl,
            'periode' => $request->periode,
            'metode' => $request->metode,
            'aktual' => $request->aktual,
            'hasil' => $request->hasil,
            'MAPE' => $request->MAPE,
            'rekomendasi_stok' => $request->rekomendasi_stok,
        ];

        $data = $this->peramalan->create($params);
        alert()->success('Peramalan Berhasil Ditambah', 'Peramalan');
        return redirect('/peramalan');
    }

    public function riwayat()
    {
        $data = $this->peramalan->findAll();
        return view('peramalan.riwayat', compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->peramalan->delete($id);
        alert()->success('Peramalan Berhasil Dihapus', 'Peramalan');
        return redirect()->back();
    }
}
