<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Thing;

class ThingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thing::factory(5)->create();
    }
}
