<?php

namespace App\Repositories;

use App\Menu;

class MenuRepository
{
    public function findAll()
    {
        $data = Menu::get();
        return $data;
    }
    public function find($id)
    {
        $data = Menu::findOrFail($id);
        return $data;
    }
    public function upload_gambar($params)
    {
        $imagePath = $params;
        $jalur = time() . '-' . $imagePath->getClientOriginalName();
        $path = $params->storeAs('gambar', $jalur, 'public');
        $response = '/storage/gambar/' . $jalur;

        return $response;
    }

    public function create($params)
    {
        try {
            $data = Menu::create($params);
            $data->save();
        } catch (\Throwable $e) {
            alert()->error('Menu Gagal Ditambah', 'Menu');
            return redirect()->back();
        }
        return $data;
    }

    public function delete($id)
    {
        $data = Menu::findOrFail($id);
        try {
            $data->delete();
        } catch (\Throwable $e) {
            alert()->error('Menu Gagal Dihapus', 'Menu');
            return redirect()->back();
        }
    }

    public function update($params)
    {
        $data = Menu::findOrFail($params['id']);
        try {
            if ($params['gambar'] !== null) {
                $str = str_replace('/storage', '', $data->gambar);
                unlink(storage_path('app/public' . $str));
                $path = $this->upload_gambar($params['gambar']);
                $params['gambar'] = $path;
            } else {
                $params['gambar'] = $data->gambar;
            }
            $data->update($params);
        } catch (\Throwable $e) {
            alert()->error('Menu Gagal Diupdate', 'Menu');
            return redirect()->back();
        }
    }

}
