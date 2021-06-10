<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Service();
        $s->user_id = 1;
        $s->title = "Babysitten";
        $s->description = "Ik heb wat tijd over en zou graag op jouw peuter passen! Ik ben dol op kinderen en dat zie je aan de prijs!";
        $s->price = 5.50;
        $s->category_id = 7;
        $s->save();

        $s = new Service();
        $s->user_id = 2;
        $s->title = "Allerhande klusjes";
        $s->description = "Nu ik gepensioneerd ben kan ik anderen helpen met klusjes in het huis. De grootste beloning voor mij is het sociaal contact";
        $s->price = 2.50;
        $s->category_id = 5;
        $s->save();

        $s = new Service();
        $s->user_id = 3;
        $s->title = "Wiskunde bijles";
        $s->description = "Ik keer volgend jaar terug naar school en zou graag mijn wiskunde wat verfrissen. Welke betere manier dan door anderen te onderwijzen?";
        $s->price = 5.0;
        $s->category_id = 1;
        $s->save();

        Service::factory(5)->create();
    }
}
