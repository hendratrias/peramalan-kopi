<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = "detail_transaksi";
    protected $fillable = [
        'transaksi_id', 'menu_id', 'qty', 'status',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
