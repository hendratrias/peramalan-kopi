<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peramalan extends Model
{
    protected $table = "peramalan";
    protected $fillable = [
        'menu_id', 'tgl', 'periode', 'metode', 'aktual', 'hasil', 'MAPE', 'rekomendasi_stok',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
    public function bahan_baku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id');
    }
}
