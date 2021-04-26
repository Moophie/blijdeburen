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
        $michael->save();

        $miyaa = new User();
        $miyaa->firstname = "Miyaa";
        $miyaa->lastname = "Kan";
        $miyaa->email = "miyaa@test.com";
        $miyaa->password = Hash::make("test");
        $miyaa->city = "Beigem";
        $miyaa->save();
    }
}
