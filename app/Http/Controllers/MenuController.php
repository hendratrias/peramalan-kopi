<?php

namespace App\Http\Controllers;

use App\Repositories\BahanBakuRepository;
use App\Repositories\MenuRepository;
use App\Repositories\ResepRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function __construct(MenuRepository $menu, BahanBakuRepository $bahan_baku, ResepRepository $resep)
    {
        $this->menu = $menu;
        $this->bahan_baku = $bahan_baku;
        $this->resep = $resep;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->menu->findAll();
        $bahan_baku = $this->bahan_baku->findAll();
        return view('menu.index', compact("data", "bahan_baku"));
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
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'gambar' => 'required',
        ]);
        $path = $this->menu->upload_gambar($request->gambar);
        $harga = str_replace('.', '', $request->harga);
        $params = [
            'nama' => $request->nama,
            'harga' => (int) $harga,
            'gambar' => $path,
        ];
        $menu = $this->menu->create($params);
        foreach ($request->resep as $key => $item) {

            $params_resep[$key] = [
                'menu_id' => $menu->id,
                'bahan_baku_id' => $item,
                'takaran' => $request->takaran[$key],
            ];

        }

        $this->resep->create($params_resep);
        alert()->success('Menu Berhasil Ditambah', 'Menu');
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
    public function update(Request $request, $id)
    {
        $harga = str_replace('.', '', $request->harga);
        $params = [
            'id' => $id,
            'nama' => $request->nama,
            'harga' => (int) $harga,
            'gambar' => $request->gambar,
        ];
        $menu = $this->menu->update($params);
        alert()->success('Menu Berhasil Diupdate', 'Menu');
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
        $this->menu->delete($id);
        alert()->success('Menu Berhasil Dihapus', 'Menu');
        return redirect()->back();
    }
}
