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
        $t = new Thing();
        $t->user_id = 1;
        $t->title = "Party tent";
        $t->description = "Partytent die maar één keer gebruikt is voor een sweet 18.";
        $t->price = 8;
        $t->condition = "Zeer goed";
        $t->category_id = 3;
        $t->save();

        $t = new Thing();
        $t->user_id = 2;
        $t->title = "Boormachine";
        $t->description = "Een iets oudere maar zeer betrouwbaar boormachine.";
        $t->price = 2;
        $t->condition = "Gemiddeld";
        $t->category_id = 5;
        $t->save();

        $t = new Thing();
        $t->user_id = 3;
        $t->title = "Puzzel";
        $t->description = "Volledige puzzel die ik al meerdere keren heb gemaakt. Plezier gegarandeerd!";
        $t->price = 0.5;
        $t->condition = "Goed";
        $t->category_id = 8;
        $t->save();

        Thing::factory(5)->create();
    }
}
