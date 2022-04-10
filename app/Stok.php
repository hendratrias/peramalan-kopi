<?php

namespace App;

use App\BahanBaku;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = "stok";
    protected $fillable = [
        'bahan_baku_id', 'tgl_beli', 'tgl_kadaluarsa', 'jumlah_beli', 'sisa', 'status',
    ];

    public function bahan_baku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id');
    }
}
