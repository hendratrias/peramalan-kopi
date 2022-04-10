<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";
    protected $fillable = [
        'user_id', 'tgl_trans', 'total', 'bayar', 'kembali', 'no_meja', 'status',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
