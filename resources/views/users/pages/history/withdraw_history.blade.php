@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\history\history.css')}}?v={{Config('app.version')}}">

<section id="History" style="margin-bottom: 14rem">
    <div class="container">
        <div class="header_mr">
            <h2 class="main-header">WITHDRAW HISTORY</h2>
        </div>

        @if ($withdraw_data == '[]')
            <h2 class="title text-danger">No data found!</h2>
        @endif

        @foreach ($withdraw_data as $item)
            <div class="footer_mr">
                <div class="items">
                    <h2 class="header mb-5">Payment method {{$item['method']}}</h2>
                    <p class="title">Payment status : <span style="text-transform: uppercase" class="text-warning">{{$item['st']}}</span></p>
                    <p class="title">Payment amount : <span style="text-transform: uppercase" class="text-success">{{$item['amount']}}৳</span></p>
                    <p class="title">Payment ID : <span style="text-transform: uppercase" class="text-danger">{{$item['orderID']}}</span></p>
                    <hr>
                    <p class="title">{{$item['date']}}</p>
                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection