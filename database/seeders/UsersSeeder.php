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
        // Make 3 test users for the devs
        $michael = new User();
        $michael->firstname = "Michael";
        $michael->lastname = "Van Lierde";
        $michael->email = "michael@test.com";
        $michael->password = Hash::make("test");
        $michael->profile_img = "person_placeholder.png";
        $michael->city = "Unknown";
        $michael->geolng = 4.4000;
        $michael->geolat = 51.2000;
        $michael->rating = 3;
        $michael->save();

        $miyaa = new User();
        $miyaa->firstname = "Miyaa";
        $miyaa->lastname = "Kan";
        $miyaa->email = "miyaa@test.com";
        $miyaa->password = Hash::make("test");
        $miyaa->profile_img = "person_placeholder.png";
        $miyaa->city = "Unknown";
        $miyaa->geolng = 4.3000;
        $miyaa->geolat = 51.2000;
        $miyaa->rating = 4;
        $miyaa->save();

        $test = new User();
        $test->firstname = "Test";
        $test->lastname = "Man";
        $test->email = "test@test.com";
        $test->password = Hash::make("test");
        $test->profile_img = "person_placeholder.png";
        $test->city = "Unknown";
        $test->geolng = 4.3000;
        $test->geolat = 51.4000;
        $test->rating = 5;
        $test->save();
    }
}
