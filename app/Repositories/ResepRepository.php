<?php

namespace App\Repositories;

use App\Resep;
use DB;

class ResepRepository
{
    public function findAll()
    {
        $data = Resep::get();
        return $data;
    }

    public function response_get_resep($id)
    {
        $data = Resep::where('menu_id', $id)->get();
        $response = '';
        if ($data->isEmpty() === false) {
            foreach ($data as $key => $item) {
                $response .=
                '<tr>
                        <th scope="row">' . ($key + 1) . '</th>
                        <td>' . ($item->bahan_baku->nama) . '</td>
                        <td>' . $item->takaran . '</td>
                        <td>
                            <button class="btn btn-lg btn-warning text-white editMenu" data-toggle="modal" data-nama="' . $item->bahan_baku->nama . '" data-takaran="' . $item->takaran . '" data-target="#editMenu" data-menu="' . $id . '" data-bahan="' . $item->bahan_baku->id . '" data-id="' . $item->id . '"><i class="fa fa-edit"></i></button>
                            <button type="button"  class="btn btn-lg btn-danger text-white hapus"  data-toggle="modal" data-nama="' . $item->bahan_baku->nama . '"  data-target="#HapusData" data-id="' . $item->id . '"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>';
            };
            $response .= '<tr><td><a class="btn btn-sm btn-success text-light tambahResep" data-toggle="modal" data-target="#tambahResep" data-id="' . $id . '"><i class="fa fa-plus"></i> Tambah Resep</a></td></tr>';
        }
        return $response;

    }

    public function create($params)
    {
        try {
            foreach ($params as $item) {
                $data = Resep::create($item);
                $data->save();
            }
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $data = Resep::findOrFail($id);
        try {
            $data->delete();
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }

    public function getResepMenu($id)
    {
        $data = DB::table('resep')
            ->join('bahan_baku', 'resep.bahan_baku_id', '=', 'bahan_baku.id')
            ->join('menu', 'resep.menu_id', '=', 'menu.id')
            ->join('stok', 'stok.bahan_baku_id', '=', 'bahan_baku.id')
            ->where('menu.id', $id)
            ->orderBy('stok.tgl_kadaluarsa', 'ASC')
            ->get();
        return $data;
    }

    public function getBahanMenu($id_menu, $id_bahan_baku)
    {
        $data = DB::table('resep')
            ->join('bahan_baku', 'resep.bahan_baku_id', '=', 'bahan_baku.id')
            ->join('menu', 'resep.menu_id', '=', 'menu.id')
            ->join('stok', 'stok.bahan_baku_id', '=', 'bahan_baku.id')
            ->where('menu.id', $id_menu)
            ->where('bahan_baku.id', $id_bahan_baku)
            ->orderBy('stok.tgl_kadaluarsa', 'ASC')
            ->get();
        return $data;
    }

    public function findMenu($id)
    {
        $data = Resep::where('menu_id', $id)->get();
        return $data;
    }

    public function updateResep($params)
    {
        $data = Resep::findOrFail($params['id']);
        try {
            $data->update($params);
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }
}
