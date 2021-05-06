<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Category();
        $c->name = 'Tuin';
        $c->save();

        $c = new Category();
        $c->name = 'Keuken';
        $c->save();

        $c = new Category();
        $c->name = 'Knutselen';
        $c->save();

        $c = new Category();
        $c->name = 'Boormachines';
        $c->save();

        $c = new Category();
        $c->name = 'Grasmaaiers';
        $c->save();

        $c = new Category();
        $c->name = 'Schilderen';
        $c->save();

        $c = new Category();
        $c->name = 'Barbecue';
        $c->save();
    }
}
