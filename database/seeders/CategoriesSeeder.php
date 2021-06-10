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
        $c->name = 'Bijlessen & Onderwijs';
        $c->save();

        $c = new Category();
        $c->name = 'Computer & ICT';
        $c->save();

        $c = new Category();
        $c->name = 'Events';
        $c->save();

        $c = new Category();
        $c->name = 'Financiën';
        $c->save();

        $c = new Category();
        $c->name = 'Klussen & Reparaties';
        $c->save();

        $c = new Category();
        $c->name = 'Mobiliteit';
        $c->save();

        $c = new Category();
        $c->name = 'Oppas';
        $c->save();

        $c = new Category();
        $c->name = 'Sport & Vrije Tijd';
        $c->save();

        $c = new Category();
        $c->name = 'Tuinieren';
        $c->save();

        $c = new Category();
        $c->name = 'Zorg & Hulpverlening';
        $c->save();

        $c = new Category();
        $c->name = 'Overige';
        $c->save();
    }
}
