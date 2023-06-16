@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\home\home.css')}}">

<section id='home'>
    <div class="container">

        @include('users.pages.home.components.slider')

        <!-- menu btn  -->
        <div class="menu_wrapper">
            <a href="{{route('web_deposit_show')}}" class="item">
                <img src="{{asset('.\images\icons\deposit.png')}}" alt="">
                <div class="title">ডিপজিট</div>
            </a>
            <a href="{{route('web_withdraw_show')}}" class="item">
                <img src="{{asset('.\images\icons\withdraw.png')}}" alt="">
                <div class="title">উত্তলন</div>
            </a>
            <a href="{{route('web_invite_show')}}" class="item">
                <img src="{{asset('.\images\icons\invite.png')}}" alt="">
                <div class="title">আমন্ত্রন </div>
            </a>
            <a href="{{route('web_company_show')}}" class="item">
                <img src="{{asset('.\images\icons\company_info.png')}}" alt="">
                <div class="title">কম্পানি</div>
            </a>

            <a href="{{route('web_personal_info')}}" class="item">
                <img src="{{asset('.\images\icons\personal_info.png')}}" alt="">
                <div class="title">পারসোনাল</div>
            </a>
            <a href="{{route('web_task_show')}}" class="item">
                <img src="{{asset('.\images\icons\task_info.png')}}" alt="">
                <div class="title">কাজ</div>
            </a>
            <a href="{{route('web_info_show')}}" class="item">
                <img src="{{asset('.\images\icons\iunfo.png')}}" alt="">
                <div class="title">তথ্য</div>
            </a>
            <a href="{{$adminData['teligram_link']}}" class="item">
                <img src="{{asset('.\images\icons\telegram.png')}}" alt="">
                <div class="title">টেলিগ্রাম</div>
            </a>
        </div>
        <!--Notification-->
        <div class="notification_wrapper">
            <div class="notification_left">
                <i class="fa-solid fa-volume-high header"></i>
            </div>
            <div class="notification_right">
                <h2 class="title">
                    {{$adminData['home_notification']}}
                </h2>
            </div>
            <div class="notification_close">
                <i class="fa-solid fa-circle-xmark header"></i>
            </div>
        </div>
        <!-- cards -->
        <div class="paclages_card_wrapper">
            <div class="paclages_card_wrapper_footer">
                <!--
                    <div class="cards active">
                        <h2 class="header">AMAZON</h2>
                        <p class="title">* 10% commission daily</p>
                        <p class="title">* 6 task daily</p>
                        <p class="title">* 100 - 200 bdt</p>
                        <div class="img_wrapper">
                            <img src="{{asset('.\images\cards\amazon.webp')}}" alt="">
                            <img class="lock_img unlock" src="{{asset('.\images\icons\unlock.png')}}" alt="">
                            <img class="lock_img lock " src="{{asset('.\images\icons\lock.png')}}" alt="">
                        </div>
                    </div>
                -->
            </div>
        </div>


    </div>
</section>

<!-- hidden  -->
<div class="hidden_notice home_notice">
    <div class="container">
        <div class="container_wrapper">
            <div class="top">
                <h4 class="header text-warning">
                    <span>
                        <i class="fa-solid fa-hand-point-right text-success"></i>
                    </span>
                     <span> জরুরী বিজ্ঞপ্তী </span>
                    <span>
                        <i class="fa-solid fa-hand-point-left text-success"></i>
                    </span>
                </h4>
            </div>
            
            <div class="bottom">
                <div class="bottom_top">
                    <p class="title">
                        {{$adminData['home_notification']}}
                    </p>
                </div>
                <div class="bottom_bottom">
                    <button class="btn btn-danger title">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                        <span>Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('.\js\now\home.js')}}?v=1.0"></script>

@include('users.layout.footer2')
@endsection
