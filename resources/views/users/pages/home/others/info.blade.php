@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\now\home\others\info.css')}}">

<section class="information">
    <div class="container">
        <div class="header_mr">
            <h2 class="main-header mt-5 mb-5">সাইটের তথ্য</h2>
        </div>
        
        <div class="box">
            <h2 class="header">ডিপজিটের তথ্য</h2>
            <p class="title">আমাদের সাইটে আপনি সর্বনিম্ন {{$adminData['minDeposit']}} টাকা ডিপজিটের করতে পারবেন।</p>
            <hr class="mb-5">

            <h2 class="header">উত্তোলনের তথ্য</h2>
            <p class="title">আমাদের সাইটে আপনি সর্বনিম্ন {{$adminData['minWithdraw']}} টাকা উত্তোলনের করতে পারবেন। উত্তোলন ফী অবশ্যই {{$adminData['withdraw_charge']}}%।</p>
            <hr class="mb-5">

            <h2 class="header">একাউন্টের  তথ্য</h2>
            <p class="title">আমাদের সাইটে আপনি একাউন্ট খুললে {{$adminData['offer_balance']}} টাকা বোনাস পাবেন।</p>

        </div>
        
    </div>
</section>

@include('users.layout.footer2')
@endsection
