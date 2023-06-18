@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\home\balance\deposit.css')}}">

<section class="deposit" style="margin-bottom: 14rem">
    <div class="container">

        <div class="header_mr">
            <h2 class="main-header">DEPOSIT</h2>
        </div>
        
        <!--Notification-->
        <div class="notification_wrapper">
            <div class="notification_left">
                <i class="fa-solid fa-volume-high header"></i>
            </div>
            <div class="notification_right">
                <h2 class="title">
                    {{$adminData['deposit_info']}}
                </h2>
            </div>
            <div class="notification_close">
                <i class="fa-solid fa-circle-xmark header"></i>
            </div>
        </div>

        <!-- deposit wrapper  -->
        <form action="{{route('api_deposit_submit')}}" method="post" enctype="multipart/form-data">
            <div class="deposit_wrapper">
                <span class="amount mb-3">
                    <p class="title mb-0"><i class="fa-solid fa-hand-point-right text-warning"></i>আপনার অর্থ লেখুন</p>
                    <div class="box mt-0">
                        <i class="fa-solid fa-coins title"></i>
                        <input type="number" name="amount" class="title" placeholder="Inter your amount..." required>
                    </div>
                    <p class="title error"></p>
                </span>

                <span class="method mb-5">
                    <p class="title"><i class="fa-solid fa-hand-point-right text-warning"></i>আপনার পেমেন্ট পদ্ধতি নির্বাচন করুন</p>

                    <div class="method_wrapper">
                        @if(!empty($adminData['bkash_number']))
                            <div class="item active">
                                <input type="radio" name="method" value="bkash" checked>
                                <i class="fa-solid fa-square-check main-header"></i>
                                <img src="{{asset('.\images\icons\bkash.svg')}}" alt="">
                            </div>
                        @endif
                        
                        @if(!empty($adminData['nagad_number']))
                            <div class="item">
                                <input type="radio" name="method" value="nagad">
                                <i class="fa-solid fa-square-check main-header"></i>
                                <img src="{{asset('.\images\icons\nagad.png')}}" alt="">
                            </div>
                        @endif

                        @if(!empty($adminData['rocket_number']))
                            <div class="item">
                                <input type="radio" name="method" value="rocket">
                                <i class="fa-solid fa-square-check main-header"></i>
                                <img src="{{asset('.\images\icons\rocket.png')}}" alt="">
                            </div>
                        @endif
                        
                    </div>
                    
                    <div class="note sendmoney d-none">
                        <p class="title">
                            <i class="fa-solid fa-share text-primary main-header"></i>
                            <span class="text">আমাদের নাম্বারে টাকা সেন্ড মানি করুন</span>
                        </p>
                    </div>

                    @if(!empty($adminData['bkash_number']))
                        <div class="note payment">
                            <p class="title mt-3">
                                <i class="fa-solid fa-share text-primary main-header"></i>
                                <span class="text">বিক্যাস এপ্পস খুলুন</span>
                            </p>
                            <p class="title mb-3">
                                <i class="fa-solid fa-share text-primary main-header"></i>
                                <span class="text">সেন্ড মানি অপশন এ ক্লিক করুন</span>
                            </p>
                            <img src="{{asset('.\images\icons\bkash_payment.jpeg')}}" class="d-none" alt="">
                        </div>
                    @endif
                    
                </span>

                <span class="number mb-3">
                    <p class="title mb-0"><i class="fa-solid fa-hand-point-right text-warning"></i>আমাদের নাম্বার</p>
                    <div class="box mt-0">
                        <i class="fa-solid fa-phone title"></i>
                        <input style="border-radius: 0" type="text" value="{{$adminData['bkash_number']}}" class="title" id="copy_our_number" placeholder="Copy our number..." disabled>
                        <i class="fa-solid fa-copy title copy"></i>
                        <!-- number  -->
                        <input type="hidden" class="bkash_number" value="{{$adminData['bkash_number']}}">
                        <input type="hidden" class="nagad_number" value="{{$adminData['nagad_number']}}">
                        <input type="hidden" class="rocket_number" value="{{$adminData['rocket_number']}}">

                    </div>
                    <p class="title error"></p>
                </span>

                <span class="tranxID mb-3">
                    <p class="title mb-0"><i class="fa-solid fa-hand-point-right text-warning"></i>আপনার পেমেন্ট ট্রানজেকশন নাম্বার</p>
                    <div class="box mt-0">
                        <i class="fa-solid fa-id-badge title"></i>
                        <input type="text" name="tranx" class="title" placeholder="Your tranction ID..." required>
                    </div>
                    <p class="title error"></p>
                </span>

                <span class="file mb-3">
                    <p class="title mb-0"><i class="fa-solid fa-hand-point-right text-warning"></i>আপনার পেমেন্ট প্রুভ হিসাবে, স্ক্রিনশট দিন</p>
                    <div class="box mt-0">
                        <i class="fa-solid fa-file title"></i>
                        <input type="file" name="img" class="title" style="padding: 0.8rem" required>
                    </div>
                    <p class="title error"></p>
                </span>

                <span>
                    <div class="box">
                        <button type="submit" class="title submit">কনর্ফম করুন</button>
                    </div>
                </span>

            </div>
        </form>

    </div>
</section>


<!-- hidden  -->
<div class="hidden_notice">
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
                        {{$adminData['deposit_info']}}
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

@if (session() -> has('msg'))
    <!-- hidden  -->
    <div class="hidden_notice">
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
                    <div class="bottom_top">
                        <p class="title">
                            {{session() -> get('msg')}}
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
@endif


<!-- script -->
<script src="{{asset('.\js\now\deposit.js')}}"></script>

@endsection
