<?php

namespace Database\Seeders;

use App\Models\Advert;
use Illuminate\Database\Seeder;

class AdvertsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Advert();
        $a->user_id = 1;
        $a->title = "Barbecue op rolletjes";
        $a->description = "Ik geef deze zomer een groot feest en zou graag een makkelijk verplaatsbare barbecue gebruiken van iemand! Je krijgt hem gewassen en in betere staat terug ;)";
        $a->save();

        $a = new Advert();
        $a->user_id = 2;
        $a->title = "Wafelijzer";
        $a->description = "Mijn kindjes maken wafels met de school en hadden daarvoor een wafelijzer nodig! Dit is dringend!!!";
        $a->save();

        $a = new Advert();
        $a->user_id = 3;
        $a->title = "Grasmaaier";
        $a->description = "Ik ga een nieuwe grasmaaier kopen en vroeg me af of ik iemand zijn grasmaaier kon testen?";
        $a->save();

        Advert::factory(5)->create();
        
    }
}
