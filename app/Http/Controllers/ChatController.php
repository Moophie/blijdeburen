<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function show($transaction_id){
        $transaction = Transaction::find($transaction_id);

        $data['transaction'] = $transaction;
        $data['partner'] = $transaction->other_user();

        return view('transactions/chat', $data);
    }
}
