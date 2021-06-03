<?php

namespace App\Http\Controllers;

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

        if (!empty($data['user'])) {
            $i = 0;
            foreach ($data['things'] as $thing) {
                $data['things'][$i]['distance'] = $data['user']->distanceFromUser($thing->geolat, $thing->geolng);
                $i++;
            }
        }

        return view('index', $data);
    }
}
