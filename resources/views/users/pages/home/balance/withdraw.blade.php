@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\home\balance\deposit.css')}}">

<section class="deposit" style="margin-bottom: 14rem">
    <div class="container">

        <div class="header_mr">
            <h2 class="main-header">WITHDRAW</h2>
        </div>
        
        <!--Notification-->
        <div class="notification_wrapper">
            <div class="notification_left">
                <i class="fa-solid fa-volume-high header"></i>
            </div>
            <div class="notification_right">
                <h2 class="title">
                    {{$adminData['withdraw_info']}}
                </h2>
            </div>
            <div class="notification_close">
                <i class="fa-solid fa-circle-xmark header"></i>
            </div>
        </div>

        <!-- deposit wrapper  -->
        <form class="submit_form" method="post" >
            <div class="deposit_wrapper">

                <span class="amount mb-3">
                    <p class="title mb-0"><i class="fa-solid fa-hand-point-right text-warning"></i>আপনার অর্থ লেখুন</p>
                    <div class="box mt-0">
                        <i class="fa-solid fa-coins title"></i>
                        <input type="number" class="title amount_r" placeholder="Inter your amount..." required>
                    </div>
                    <p class="title error"></p>
                </span>

                <span class="method mb-3">
                    <p class="title mb-0"><i class="fa-solid fa-hand-point-right text-warning"></i>আপনার পেমেন্ট পদ্ধতি নির্বাচন করুন</p>
                    <div class="method_wrapper">

                        @if (!empty($adminData['withdraw_bkash_number']))
                            <div class="item active">
                                <input type="hidden" value="bkash">
                                <i class="fa-solid fa-square-check main-header"></i>
                                <img src="{{asset('.\images\icons\bkash.svg')}}" alt="">
                            </div>
                        @endif

                        @if (!empty($adminData['withdraw_nagad_number']))
                            <div class="item">
                                <input type="hidden" value="nagad">
                                <i class="fa-solid fa-square-check main-header"></i>
                                <img src="{{asset('.\images\icons\nagad.png')}}" alt="">
                            </div>
                        @endif

                        @if (!empty($adminData['withdraw_rocket_number']))
                            <div class="item">
                                <input type="hidden" value="rocket">
                                <i class="fa-solid fa-square-check main-header"></i>
                                <img src="{{asset('.\images\icons\rocket.png')}}" alt="">
                            </div>
                        @endif
                        
                    </div>
                    
                </span>

                <span class="number mb-3">
                    <p class="title mb-0"><i class="fa-solid fa-hand-point-right text-warning"></i>আপনার নাম্বারটি লেখুন</p>
                    <div class="box mt-0 ">
                        <i class="fa-solid fa-phone title"></i>
                        <input type="text" class="title address" placeholder="Your number..." required>
                    </div>
                    <p class="title error"></p>
                </span>


                <span>
                    <div class="box">
                        <button class="title submit">কনর্ফম করুন</button>
                    </div>
                </span>

            </div>
        </form>

    </div>
</section>


<!-- hidden  -->
<div class="hidden_notice withdraw_notification">
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
                    <h4 class="title">
                        {{$adminData['withdraw_info']}}
                    </h4>
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

<div class="hidden_notice withdraw_err d-none">
    <div class="container">
        <div class="container_wrapper">
            <div class="top">
                <h4 class="header text-warning">
                    <span>
                        <i class="fa-solid fa-hand-point-right text-success"></i>
                    </span>
                     <span> বার্তা </span>
                    <span>
                        <i class="fa-solid fa-hand-point-left text-success"></i>
                    </span>
                </h4>
            </div>
            
            <div class="bottom">
                <div class="bottom_top title">
                    {{-- <p class="title"></p> --}}
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

<!-- script -->
<script src="{{asset('.\js\now\withdraw.js')}}"></script>
@endsection
