<?php

namespace App\Http\Controllers;

use App\Http\Requests\BahanBakuRequest;
use App\Repositories\BahanBakuRepository;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    public function __construct(BahanBakuRepository $bahan_baku)
    {
        $this->bahan_baku = $bahan_baku;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->bahan_baku->findAll();
        return view('stok.index', compact('data'));
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
    public function store(BahanBakuRequest $request)
    {
        $request->validate([
            'nama' => 'required|unique:bahan_baku',
            'jenis' => 'required',
        ]);

        $bahan_baku = [
            'nama' => $request->nama,
            'jenis' => $request->jenis,
        ];
        $this->bahan_baku->create($bahan_baku);
        alert()->success('Bahan Baku Berhasil Ditambah', 'Bahan Baku');
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
    public function update(BahanBakuRequest $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
        ]);

        $bahan_baku = [
            'id' => $id,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
        ];
        $this->bahan_baku->update($bahan_baku);
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
        $this->bahan_baku->delete($id);
        alert()->success('Bahan Baku Berhasil Dihapus', 'Bahan Baku');
        return redirect()->back();
    }
}
