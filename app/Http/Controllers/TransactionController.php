<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Category;
use App\Models\Image;
use App\Models\Service;
use App\Models\Thing;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function transactions($mode = 'Actief')
    {
        if ($mode == 'Actief') {
            $data['mode_text'] = 'Actief gerief.';
            $data['transactions'] = Transaction::where(function ($query) {
                $query->where('user1_id', Auth::id())
                      ->orWhere('user2_id', Auth::id());
            })->where('end_date', '>=', Carbon::now('Europe/Brussels'))->where('start_date', '<=', Carbon::now('Europe/Brussels'))->get();
        }

        if ($mode == 'Geschiedenis') {
            $data['mode_text'] = 'Geschiedenis transacties.';
            $data['transactions'] = Transaction::where(function ($query) {
                $query->where('user1_id', Auth::id())
                      ->orWhere('user2_id', Auth::id());
            })->where('end_date', '<=', Carbon::now('Europe/Brussels'))->get();
        }

        $i = 0;
        foreach ($data['transactions'] as $transaction) {
            $data['transactions'][$i]['other_party'] = $transaction->other_user();
            $datetime_start = new DateTime($transaction->start_date);
            $transaction->start_date = $datetime_start->format('d M');
            $datetime_end = new DateTime($transaction->end_date);
            $transaction->end_date = $datetime_end->format('d M');
            $i++;
        }

        return view('transactions/index', $data);
    }

    public function switchMode(Request $request)
    {
        $mode = $request->input('mode');

        return redirect()->route('transactions', ['mode' => $mode]);
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
        $t->category_id = $request->input('category');
        $t->save();

        if ($request->hasFile('offer-image')) {
            foreach ($request->file('offer-image') as $file) {
                $filename = $file->getClientOriginalName();
                $file->storeAs('images', $filename, 'public');

                $i = new Image();
                $i->parent_id = $t->id;
                $i->img_url = $filename;
                $i->save();
            }
        }

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

    public function createTransaction(Request $request)
    {
        $t = new Transaction();
        $t->thing_id = $request->input('thing_id');
        $t->user1_id = $request->input('user1_id');
        $t->user2_id = $request->input('user2_id');
        $t->status = 'unconfirmed';
        $t->save();

        return redirect()->route('chat', ['transaction' => $t->id]);
    }

    public function detailsThing($id)
    {
        $data['thing'] = Thing::find($id);

        return view('transactions/thing_detail', $data);
    }
}
