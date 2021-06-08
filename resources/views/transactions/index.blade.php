@extends('layouts/app')

@section('title')
    Transacties
@endsection

@section('content')
    <div class="menuTransaction">
        <form action="" method="POST">
            @csrf
            <input type="submit" value="Actief" name="mode" id="activeTrans">
            <input type="submit" value="Geschiedenis" name="mode" id="historyTrans">
        </form>
    </div>
    <div>
        @if ($transactions->count() == 0)
    <div id="illustration"><img src="/images/active_transactions_illustration.svg" width="80%" alt=""></div>

            <h1 class="titleTrans">{{ $mode_text }}</h1>
        @else
            @foreach ($transactions as $transaction)
                <div class="card">
                    <img src="{{ $transaction['other_party']->profile_img }}" alt="">
                    <div>
                        <h2>
                            @if ($transaction->thing)
                                {{ $transaction->thing->title }}
                            @endif

                            @if ($transaction->service)
                                {{ $transaction->service->title }}
                            @endif
                        </h2>
                        <div>
                            <img src="/images/icons/icon_trans_arrows.svg" width="20px" alt="">
                            <div class="date">
                                <p>{{ $transaction->start_date }} - {{ $transaction->end_date }}</p>
                            </div>
                        </div>
                        <div>
                            <p>Details</p>
                            <img src="/images/icons/icon_expand.svg" width="20px" alt="">
                        </div>
                        <div>
                            <p>Gesprek</p>
                            <img src="/images/icons/icon_chat.svg" width="20px" alt="">
                        </div>
                    </div>
                </div>
                <div class="transaction-details hidden">
                    <ul>
                        <li>Product titel: {{$transaction->thing->title}}</li>
                        <li>Naam uitlener: {{$transaction->thing->user->firstname}} {{$transaction->thing->user->lastname}}</li>
                        <li>Datum: {{ $transaction->start_date }} - {{ $transaction->end_date }}</li>
                        <li>Adres: ADD:ITEM LOCATION</li>
                        <li>Beschrijving: {{$transaction->thing->description}}</li>
                        <li>Prijs: {{$transaction->thing->price}}</li>
                    </ul>
                </div>
            @endforeach
        @endif
    </div>
    @component('components/navbar')
    @endcomponent

@endsection
