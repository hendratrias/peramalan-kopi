<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $fillable = [
        'nama', 'harga', 'gambar',
    ];

    public function resep()
    {
        return $this->hasMany(Resep::class);
    }
}
