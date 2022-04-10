<?php

namespace App\Http\Controllers;

use App\Repositories\BahanBakuRepository;
use App\Repositories\MenuRepository;
use App\Repositories\ResepRepository;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function __construct(ResepRepository $resep, MenuRepository $menu, BahanBakuRepository $bahan_baku)
    {
        $this->resep = $resep;
        $this->menu = $menu;
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
        $menu = $this->menu->findAll();
        return view('menu.resep', compact('menu', 'bahan_baku'));
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
        foreach ($request->resep as $key => $item) {

            $params_resep[$key] = [
                'menu_id' => $request->menu_id[$key],
                'bahan_baku_id' => $request->resep[$key],
                'takaran' => $request->takaran[$key],
            ];

        }

        $this->resep->create($params_resep);
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
        $response = $this->resep->response_get_resep($id);
        return $response;
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
        $params = [
            'id' => $id,
            'bahan_baku_id' => $request->bahan_baku,
            'takaran' => $request->takaran,
        ];

        $this->resep->updateResep($params);
        alert()->success('Resep Berhasil Ditambah', 'Resep');
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
        $this->resep->delete($id);
        return redirect()->back();
    }
}
