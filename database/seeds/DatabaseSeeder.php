<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(BahanBakuSeeder::class);
        $this->call(ResepSeeder::class);
        $this->call(PenjualanSeeder::class);
        $this->call(TransaksiSeeder::class);
    }
}
