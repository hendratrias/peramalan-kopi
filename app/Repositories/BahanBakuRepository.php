<?php

namespace App\Repositories;

use App\BahanBaku;
use App\Stok;

class BahanBakuRepository
{
    public function findAll()
    {
        $data = BahanBaku::get();
        foreach ($data as $key => $item) {
            $response[$key] = [
                'id' => $item->id,
                'nama' => $item->nama,
                'jenis' => $item->jenis,
                'stok' => $this->stok($item->id),
            ];
        }
        return $response;
    }

    public function create($params)
    {
        try {
            $data = BahanBaku::create($params);
            $data->save();
        } catch (\Throwable $e) {
            alert()->error('Bahan Baku Gagal Ditambah', 'Bahan Baku');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $data = BahanBaku::findOrFail($id);
        try {
            $data->delete();
        } catch (\Throwable $e) {
            alert()->error('Bahan Baku Gagal Dihapus', 'Bahan Baku');
            return redirect()->back();
        }
    }

    public function update($params)
    {
        $data = BahanBaku::findOrFail($params['id']);
        try {
            $data->update($params);
        } catch (\Throwable $e) {
            alert()->error('Bahan Baku Gagal Diupdate', 'Bahan Baku');
            return redirect()->back();
        }

    }

    private function stok($id)
    {
        $stok = Stok::where('bahan_baku_id', $id)->get();
        $total = 0;
        if ($stok) {
            foreach ($stok as $item) {
                $total += $item->sisa;
            }
        }
        return $total;
    }
}
