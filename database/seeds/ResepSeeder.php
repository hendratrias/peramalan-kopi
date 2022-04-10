<?php

use Illuminate\Database\Seeder;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resep')->insert([
            'menu_id' => 1,
            'bahan_baku_id' => 1,
            'takaran' => 100,
        ]);
        DB::table('resep')->insert([
            'menu_id' => 2,
            'bahan_baku_id' => 1,
            'takaran' => 200,
        ]);
        DB::table('resep')->insert([
            'menu_id' => 3,
            'bahan_baku_id' => 1,
            'takaran' => 150,
        ]);
    }
}
