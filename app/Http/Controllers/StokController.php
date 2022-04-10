<?php

namespace App\Http\Controllers;

use App\Http\Requests\StokRequest;
use App\Repositories\BahanBakuRepository;
use App\Repositories\StokRepository;
use Illuminate\Http\Request;

class StokController extends Controller
{

    public function __construct(StokRepository $stok, BahanBakuRepository $bahan_baku)
    {
        $this->stok = $stok;
        $this->bahan_baku = $bahan_baku;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan_baku = $this->bahan_baku->findAll();
        $data = $this->stok->findAll();
        return view('stok.riwayat', compact('data', 'bahan_baku'));
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
    public function store(StokRequest $request)
    {
        $stok = [
            'bahan_baku_id' => $request->id,
            'tgl_beli' => $request->tgl_beli,
            'tgl_kadaluarsa' => $request->tgl_kadaluarsa,
            'jumlah_beli' => $request->jumlah_beli,
            'sisa' => $request->jumlah_beli,
            'status' => 1,
        ];

        $this->stok->create($stok);
        alert()->success('Stok Bahan Baku Berhasil Ditambah', 'Stok');
        return redirect()->back();
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
    public function update(StokRequest $request, $id)
    {
        $request->validate([
            'bahan_baku_id' => 'required',
            'tgl_beli' => 'required|before:tgl_kadaluarsa',
            'tgl_kadaluarsa' => 'required|after:tgl_beli',
            'jumlah_beli' => 'required|integer|min:0',
            'sisa' => 'required|integer',
        ]);
        $stok = [
            'id' => $id,
            'bahan_baku_id' => $request->bahan_baku_id,
            'tgl_beli' => $request->tgl_beli,
            'tgl_kadaluarsa' => $request->tgl_kadaluarsa,
            'jumlah_beli' => $request->jumlah_beli,
            'sisa' => $request->sisa,
            'status' => ($request->sisa > 0) ? 1 : 0,
        ];
        $this->stok->update($stok);
        alert()->success('Bahan Baku Berhasil Diupdate', 'Bahan Baku');
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
        $this->stok->delete($id);
        alert()->success('Stok Bahan Baku Berhasil Diupdate', 'Stok');
        return redirect()->back();
    }

}
