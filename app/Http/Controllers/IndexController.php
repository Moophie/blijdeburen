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
    public function show($mode = 'Gerief', Request $request)
    {
        if ($request->input('sort')) {
            $sort = $request->input('sort');
            $sort_direction = $request->input('sort_direction');
            $minprice = $request->input('minprice');
            $maxprice = $request->input('maxprice');
            $mindistance = $request->input('mindistance');
            $maxdistance = $request->input('maxdistance');
            $rating = $request->input('rating');

            $sql_filters = "1=1";

            $sql_filters = $sql_filters . " AND (price BETWEEN " . $minprice . " AND " . $maxprice . ")";

            if ($sort == 'price') {
                $sql_filters = $sql_filters . " ORDER BY price " . $sort_direction;
            }
            
            $data['things'] = Thing::where('user_id', '!=', Auth::id())->whereRaw($sql_filters)->get();
            $data['services'] = Service::where('user_id', '!=', Auth::id())->whereRaw($sql_filters)->get();
        } else {
            $data['things'] = Thing::where('user_id', '!=', Auth::id())->get();
            $data['services'] = Service::where('user_id', '!=', Auth::id())->get();
            $data['adverts'] = Advert::where('user_id', '!=', Auth::id())->get();
        }

        $data['user'] = Auth::user();
        $data['categories'] = Category::all();
        $data['mode'] = $mode;

        if (!empty($data['user'])) {
            $i = 0;
            foreach ($data['things'] as $thing) {
                $data['things'][$i]['distance'] = $data['user']->distanceFromUser($thing->geolat, $thing->geolng);

                if ($request->input('maxdistance')) {
                    if ($data['things'][$i]['distance'] > $maxdistance  || $data['things'][$i]['distance'] < $mindistance) {
                        unset($data['things'][$i]);
                    }
                }

                if ($request->input('category')) {
                    if ($data['things'][$i]['category_id'] != $request->input('category') ) {
                        unset($data['things'][$i]);
                    }
                }

                $i++;
            }

            $i = 0;

            foreach ($data['services'] as $service) {
                $data['services'][$i]['distance'] = $data['user']->distanceFromUser($service->user->geolat, $service->user->geolng);

                if ($request->input('maxdistance')) {
                    if ($data['services'][$i]['distance'] > $maxdistance  || $data['services'][$i]['distance'] < $mindistance) {
                        unset($data['services'][$i]);
                    }
                }

                if ($request->input('category')) {
                    if ($data['services'][$i]['category_id'] != $request->input('category') ) {
                        unset($data['services'][$i]);
                    }
                }

                $i++;
            }

            if ($request->input('sort') == 'distance') {
                if($request->input('sort_direction') == "asc"){
                    $data['things'] = $data['things']->sortBy('distance');
                    $data['services'] = $data['services']->sortBy('distance');
                }
                if($request->input('sort_direction') == "desc"){
                    $data['services'] = $data['services']->sortByDesc('distance');
                }
            }
            
            if ($mode == "Zoekertjes") {
                $i = 0;
                foreach ($data['adverts'] as $advert) {
                    $data['adverts'][$i]['distance'] = $data['user']->distanceFromUser($advert->user->geolat, $advert->user->geolng);
                    $i++;
                }
            }
        }

        return view('index', $data);
    }

    public function switchMode(Request $request)
    {
        $mode = $request->input('mode');

        return redirect()->route('index', ['mode' => $mode]);
    }

    public function showFilters($mode)
    {
        $data['mode'] = $mode;

        return view('filters', $data);
    }
}
