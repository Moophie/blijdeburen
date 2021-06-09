<?php

namespace Database\Seeders;

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
        $this->call(UsersSeeder::class);
        $this->call(ThingsSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(TransactionsSeeder::class);
        $this->call(AdvertsSeeder::class);
    }
}
