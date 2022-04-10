<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    public function findAll()
    {
        $data = User::get();
        return $data;
    }
    public function find($id)
    {
        $data = User::findOrFail($id);
        return $data;
    }
    public function upload_gambar($params)
    {
        $imagePath = $params;
        $jalur = time() . '-' . $imagePath->getClientOriginalName();
        $path = $params->storeAs('user', $jalur, 'public');
        $response = '/storage/user/' . $jalur;

        return $response;
    }

    public function create($params)
    {
        try {
            if ($params['foto'] !== null) {
                $path = $this->upload_gambar($params['foto']);
                $params['foto'] = $path;
            } else {
                $params['foto'] = '/storage/user/user.jpg';
            }
            $data = User::create($params);
            $data->save();
        } catch (\Throwable $e) {
            alert()->error('User Gagal Ditambah', 'User');
            return redirect()->back();
        }
        return $data;
    }

    public function delete($id)
    {
        $data = User::findOrFail($id);
        try {
            $data->delete();
        } catch (\Throwable $e) {
            alert()->error('User Gagal Dihapus', 'User');
            return redirect()->back();
        }
    }

    public function update($params)
    {
        $data = User::findOrFail($params['id']);
        try {
            if ($params['foto'] !== null) {
                $str = str_replace('/storage', '', $data->foto);
                if ($data->foto !== "/storage/user/user.jpg") {
                    unlink(storage_path('app/public' . $str));
                }
                $path = $this->upload_gambar($params['foto']);
                $params['foto'] = $path;
            } else {
                $params['foto'] = $data->foto;
            }
            $params['password'] = $data->password;
            $data->update($params);
        } catch (\Throwable $e) {
            alert()->error('User Gagal Diupdate', 'User');
            return redirect()->back();
        }
    }

    public function update_password($params)
    {
        $data = User::findOrFail($params['id']);
        try {
            $data->update($params);
        } catch (\Throwable $e) {
            alert()->error('Password User Gagal Diupdate', 'User');
            return redirect()->back();
        }
    }

}
