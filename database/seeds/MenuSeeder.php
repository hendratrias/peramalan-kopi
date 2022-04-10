<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'nama' => 'Bold Coffee',
            'harga' => 12000,
            'gambar' => '/storage/gambar/bold.jpg',
        ]);
        DB::table('menu')->insert([
            'nama' => 'Soft Coffee',
            'harga' => 10000,
            'gambar' => '/storage/gambar/soft.jpg',
        ]);
        DB::table('menu')->insert([
            'nama' => 'Cocoffee',
            'harga' => 11000,
            'gambar' => '/storage/gambar/cocoffee.jpg',
        ]);
    }
}
