<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Category;
use App\Models\Service;
use App\Models\Thing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function transactions()
    {
        $data['mode'] = 'Actief';
        return view('transactions/index', $data);
    }

    public function offer()
    {
        return view('transactions/offer');
    }

    public function offerThing()
    {
        $data['categories'] = Category::all();

        return view('transactions/offer_thing', $data);
    }

    public function offerService()
    {
        $data['categories'] = Category::all();
        
        return view('transactions/offer_service', $data);
    }

    public function offerAdvert()
    {
        $data['categories'] = Category::all();

        return view('transactions/offer_advert', $data);
    }

    public function createThing(Request $request)
    {
        $t = new Thing();
        $t->title = $request->input('title');
        $t->description = $request->input('description');
        $t->condition = $request->input('condition');
        $t->price = $request->input('price');
        $t->user_id = Auth::user()->id;
        $t->save();

        return redirect('/');
    }

    public function createService(Request $request)
    {
        $s = new Service();
        $s->title = $request->input('title');
        $s->description = $request->input('description');
        $s->price = $request->input('price');
        $s->user_id = Auth::user()->id;
        $s->save();

        return redirect('/');
    }

    public function createAdvert(Request $request)
    {
        $a = new Advert();
        $a->title = $request->input('title');
        $a->description = $request->input('description');
        $a->category_id = $request->input('category');
        $a->user_id = Auth::user()->id;
        $a->save();

        return redirect('/');
    }

    public function switchMode(Request $request)
    {
        $data['mode'] = $request->input('mode');
        return view('transactions/index', $data);
    }
}
