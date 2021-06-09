<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Make 2 test users for the devs
        $michael = new User();
        $michael->firstname = "Michael";
        $michael->lastname = "Van Lierde";
        $michael->email = "michael@test.com";
        $michael->password = Hash::make("test");
        $michael->city = "Beigem";
        $michael->geolng = 4.3000;
        $michael->geolat = 51.3000;
        $michael->save();

        $miyaa = new User();
        $miyaa->firstname = "Miyaa";
        $miyaa->lastname = "Kan";
        $miyaa->email = "miyaa@test.com";
        $miyaa->password = Hash::make("test");
        $miyaa->city = "Beigem";
        $miyaa->geolng = 4.3000;
        $miyaa->geolat = 51.3000;
        $miyaa->save();

        $test = new User();
        $test->firstname = "Test";
        $test->lastname = "Man";
        $test->email = "test@test.com";
        $test->password = Hash::make("test");
        $test->city = "Beigem";
        $test->geolng = 4.3000;
        $test->geolat = 51.3000;
        $test->save();
    }
}
