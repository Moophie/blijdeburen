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
    <div id="wrapper">
        @if ($transactions->count() == 0)
            <div id="illustration"><img src="/images/active_transactions_illustration.svg" width="80%" alt=""></div>

            <h1 class="titleTrans">{{ $mode_text }}</h1>
        @else
            @foreach ($transactions as $transaction)
                <div class="card">
                    <img src="{{ $transaction['other_party']->profile_img }}" alt="">
                    <div class="flex">
                        <div class="subjectTitle">
                            <h2>
                                @if ($transaction->thing)
                                    {{ $transaction->thing->title }}
                                @endif
                                @if ($transaction->service)
                                    {{ $transaction->service->title }}
                                @endif
                            </h2>
                        </div>
                    </div>
                        <div class="date">
                            <img src="/images/icons/icon_trans_arrows.svg" width="20px" alt="">
                            <div>
                                <p>{{ $transaction->start_date }} - {{ $transaction->end_date }}</p>
                            </div>
                        </div>
                        <div class="specifics">
                            <div class="details">
                                <p>Details</p>
                                <img src="/images/icons/icon_expand.svg" width="20px" alt="" id="expandIcon">
                            </div>
                            <div class="conversation">
                                <p>Gesprek</p>
                                <a href="/chat/{{ $transaction->id }}"><img src="/images/icons/icon_chat.svg" width="20px"
                                        alt="" id="chatIcon"></a>
                            </div>
                        </div>
                </div>
                <div class="transaction-details hidden">
                    <ul>
                        <li>Product titel: {{ $transaction->thing->title }}</li>
                        <li>Naam uitlener: {{ $transaction->thing->user->firstname }}
                            {{ $transaction->thing->user->lastname }}</li>
                        <li>Datum: {{ $transaction->start_date }} - {{ $transaction->end_date }}</li>
                        <li>Adres: ADD:ITEM LOCATION</li>
                        <li>Beschrijving: {{ $transaction->thing->description }}</li>
                        <li>Prijs: {{ $transaction->thing->price }}</li>
                    </ul>
                </div>
            @endforeach
        @endif
    </div>
    @component('components/navbar')
    @endcomponent

@endsection
