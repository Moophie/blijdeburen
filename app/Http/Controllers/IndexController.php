<?php

namespace App\Http\Controllers;

use App\Classes\locationAPI;
use App\Models\Category;
use App\Models\Thing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function show()
    {
        $data['things'] = Thing::all();
        $data['user'] = Auth::user();
        $data['categories'] = Category::all();

        if (!empty($data['user'])) {
            $i = 0;
            foreach ($data['things'] as $thing) {
                $data['things'][$i]['distance'] = $data['user']->distanceFromUser($thing->geolat, $thing->geolng);
                // $data['things'][$i]['city'] = locationAPI::coordsToCity($thing->geolat, $thing->geolng);
                // $data['things'][$i]['city'] = $data['things'][$i]['city']['address']['town'];
                $i++;
            }
        }

        return view('index', $data);
    }
}
