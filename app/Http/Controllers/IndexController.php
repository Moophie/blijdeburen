<?php

namespace App\Http\Controllers;

use App\Classes\locationAPI;
use App\Models\Advert;
use App\Models\Category;
use App\Models\Service;
use App\Models\Thing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function show($mode = 'Gerief')
    {
        $data['things'] = Thing::where('user_id', '!=', Auth::id())->get();
        $data['services'] = Service::where('user_id', '!=', Auth::id())->get();
        $data['adverts'] = Advert::where('user_id', '!=', Auth::id())->get();
        $data['user'] = Auth::user();
        $data['categories'] = Category::all();
        $data['mode'] = $mode;

        if (!empty($data['user'])) {
            $i = 0;
            foreach ($data['things'] as $thing) {
                $data['things'][$i]['distance'] = $data['user']->distanceFromUser($thing->geolat, $thing->geolng);
                $i++;
            }

            $i = 0;
            foreach ($data['services'] as $service) {
                $data['services'][$i]['distance'] = $data['user']->distanceFromUser($service->user->geolat, $service->user->geolng);
                $i++;
            }

           $i = 0;
            foreach ($data['adverts'] as $advert) {
                $data['adverts'][$i]['distance'] = $data['user']->distanceFromUser($advert->user->geolat, $advert->user->geolng);
                $i++;
            }
        }

        return view('index', $data);
    }

    public function switchMode(Request $request)
    {
        $mode = $request->input('mode');

        return redirect()->route('index', ['mode' => $mode]);
    }
}
