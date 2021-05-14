<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactions()
    {
        return view('transactions/index');
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
        return view('transactions/offer_advert');
    }
}
