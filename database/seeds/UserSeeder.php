<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User Admin',
            'username' => 'admin',
            'password' => Hash::make('123123'),
            'role_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'User Stok',
            'username' => 'stok',
            'password' => Hash::make('123123'),
            'role_id' => 2,
        ]);
        DB::table('users')->insert([
            'name' => 'User Keuangan',
            'username' => 'keuangan',
            'password' => Hash::make('123123'),
            'role_id' => 3,
        ]);
    }
}
