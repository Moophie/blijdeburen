<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function show($transaction_id){
        $transaction = Transaction::find($transaction_id);

        $data['transaction'] = $transaction;
        $data['partner'] = $transaction->other_user();

        return view('transactions/chat', $data);
    }

    public function sendMessage($transaction_id, Request $request){
        
        $m = new Message();
        $m->transaction_id = $transaction_id;
        $m->user_id = Auth::id();
        $m->content = $request->input('content');
        $m->send_date = Carbon::now('Europe/Brussels');
        $m->save();

        return redirect()->route('chat', ['transaction' => $m->transaction_id]);
    }
}
