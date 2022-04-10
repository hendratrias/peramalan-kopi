<?php
use Illuminate\Database\Seeder;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bahan_baku')->insert([
            'nama' => 'kopi',
            'jenis' => 1,
        ]);
    }
}
