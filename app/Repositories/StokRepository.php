<?php

namespace App\Repositories;

use App\Stok;

class StokRepository
{
    public function findAll()
    {
        $data = Stok::get();
        return $data;
    }

    public function create($params)
    {
        try {
            $data = Stok::create($params);
            $data->save();
        } catch (\Throwable $e) {
            alert()->error('Stok Bahan Baku Gagal Ditambah', 'Stok');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $data = Stok::findOrFail($id);
        try {
            $data->delete();
        } catch (\Throwable $e) {
            alert()->error('Stok Bahan Baku Gagal Dihapus', 'Stok');
            return redirect()->back();
        }
    }

    public function update($params)
    {
        $data = Stok::findOrFail($params['id']);
        try {
            $data->update($params);
        } catch (\Throwable $e) {
            alert()->error('Stok Bahan Baku Gagal Diupdate', 'Stok');
            return redirect()->back();
        }

    }

    public function getStok($id)
    {
        $resep = (new ResepRepository())->getResepMenu($id);
        if ($resep->isEmpty() === false) {

            foreach ($resep as $key => $item) {
                $data = Stok::where([['bahan_baku_id', "=", $item->bahan_baku_id], ['status', "=", 1]])->sum('sisa');
                $stok[$key] = $data / $item->takaran;
            }
            $jml_stok = floor(min($stok));
        } else {
            $jml_stok = 0;
        }

        return $jml_stok;
    }

    public function update_stok($id, $qty)
    {
        $resep = (new ResepRepository())->findMenu($id);
        foreach ($resep as $item) {
            $data = (new ResepRepository())->getBahanMenu($item->menu_id, $item->bahan_baku_id);
            foreach ($data as $key => $item) {
                $kurangiStok[$key] = $item->sisa - $qty * $item->takaran;
                if ($kurangiStok[$key] < 0) {
                    $stok = Stok::find($item->id);
                    $stok->sisa = 0;
                    $stok->status = 2;
                    $stok->save();
                    continue;
                } else {
                    if (count($data) > 1) {
                        $kurangiStok[$key] = $item->sisa - abs($kurangiStok[$key]);
                        $stok = Stok::find($item->id);
                        $stok->sisa = $kurangiStok[$key];
                        $stok->save();
                    } else {
                        $stok = Stok::find($item->id);
                        $stok->sisa = $kurangiStok[$key];
                        $stok->save();

                    }break;
                }
            }
        }
    }
}
