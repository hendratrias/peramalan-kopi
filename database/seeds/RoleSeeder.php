<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'posisi' => 'admin',
        ]);
        DB::table('role')->insert([
            'posisi' => 'stok',
        ]);
        DB::table('role')->insert([
            'posisi' => 'keuangan',
        ]);
    }
}
