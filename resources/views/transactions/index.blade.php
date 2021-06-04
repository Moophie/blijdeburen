@extends('layouts/app')

@section('title')
    Transacties
@endsection

@section('content')
    @component('components/header')
    @endcomponent

    <div>
        <form action="" method="POST">
            @csrf
            <input type="submit" value="Actief" name="mode">
            <input type="submit" value="Geschiedenis" name="mode">
        </form>
    </div>
    <div>
        @if (empty($transactions))
            <img src="/images/active_transactions_illustration.svg" width="80%" alt="">

            @if ($mode == 'Actief')
                <h1>Actief gerief</h1>
            @endif

            @if ($mode == 'Geschiedenis')
                <h1>Geschiedenis transacties.</h1>
            @endif
        @else
            @foreach($transactions as $transaction)
                <div>
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
                            <p>{{ $transaction->startdate }} - {{ $transaction->enddate }}</p>
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
            @endforeach
        @endif
    </div>
    @component('components/navbar')
    @endcomponent

@endsection
