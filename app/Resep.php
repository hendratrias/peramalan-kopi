<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = "resep";
    protected $fillable = [
        'menu_id', 'bahan_baku_id', 'takaran',
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
