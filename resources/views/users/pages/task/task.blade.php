@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\task\task.css')}}?v={{Config('app.version')}}">

<section id="task" style="margin-bottom:14rem">

    <div class="container">
        <div class="header_mr">
            <h2 class="main-header">কাজের ধাপ</h2>
        </div>

        <div class="body_mr">
            <div class="img_wrapper">
                <img class="suffle" src=".\images\task\suffle.png" alt="">
            </div>
            <div class="products_wrapper">
                <div class="img">
                    <img src="{{asset('images\task\show\avenger11-1.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-2.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-3.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-4.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-5.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-6.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-7.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-8.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-9.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-10.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-11.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-12.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-13.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-14.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-15.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-16.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-17.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-18.jpg')}}" alt="">
                    <img class="maching_img" src="{{asset('images\task\show\avenger11-19.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-20.jpg')}}" alt="">
                </div>

                <div class="img">
                    <img src="{{asset('images\task\show\avenger11-1.jpg')}}" alt="">
                    <img class="maching_img" src="{{asset('images\task\show\avenger11-2.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-3.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-4.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-5.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-6.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-7.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-8.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-9.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-10.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-11.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-12.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-13.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-14.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-15.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-16.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-17.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-18.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-19.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-20.jpg')}}" alt="">
                </div>

                <div class="img">
                    <img src="{{asset('images\task\show\avenger11-1.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-2.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-3.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-4.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-5.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-6.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-7.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-8.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-9.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-10.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-11.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-12.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-13.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-14.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-15.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-16.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-17.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-18.jpg')}}" alt="">
                    <img class="maching_img" src="{{asset('images\task\show\avenger11-19.jpg')}}" alt="">
                    <img src="{{asset('images\task\show\avenger11-20.jpg')}}" alt="">
                </div>
            </div>
        </div>
        
        @php
            $expiredate = strtotime($userData['created_at']) + 604800;
        @endphp

        <div class="start_grabing">
            @if (($expiredate < time()) && ($package_data_first['package_name'] == $userData['vipBase']))
                <button class="title btn btn-danger d-block m-auto mb-5">৭ দিনের ফ্রী ট্রায়াল শেষ</button>
            @else
                @if ($userData['task'] == '0')
                    <button class="title btn btn-danger d-block m-auto mb-5">আজকের কাজ শেষ</button>
                @else
                    <button class="btn btn-primary title d-block m-auto mb-5" id="start_grabing">Start Grabing</button>
                @endif
            @endif

            
        </div>

        <div class="footer_mr">
            <div class="items">
                <p class="title user_total_amount">..</p>
                <p class="header">মোট অর্থ</p>
            </div>

            <div class="items">
                <p class="title user_today_income">..</p>
                <p class="header"> আজকের অর্থ</p>
            </div>

            <div class="items">
                <p class="title user_generation_commission">..</p>
                <p class="header">আজকের জেনেরেশন কমিশন</p>
            </div>

            <div class="items">
                <p class="title user_available_task">..</p>
                <p class="header">বাকি কাজ</p>
            </div>
        </div>

    </div>

</section>


<!-- hidden  -->
<div class="hidden_notice commission_recived d-none">
    <div class="container">
        <div class="container_wrapper">
            <div class="top">
                <h4 class="header text-warning">
                    <span>
                        <i class="fa-solid fa-hand-point-right text-success"></i>
                    </span>
                     <span>আপনার কমিশন</span>
                    <span>
                        <i class="fa-solid fa-hand-point-left text-success"></i>
                    </span>
                </h4>
            </div>
            
            <div class="bottom">
                <div class="bottom_top">
                    <div class="products_wrapper">
                        <img style="width:100%; height:15rem;object-fit: cover; border-radius:var(--border-radius)" class="products_img" src="https://i.dummyjson.com/data/products/3/thumbnail.jpg" alt="">
                        <p class="title mt-3 mb-3 products_title">...</p>
                        <p class="title">পন্যর দাম : <span class="products_price">...</span>৳</p>
                        <input type="hidden" class="products_id" value="">
                        <p class="title">
                            <span class="text-success products_rate">...</span> Rate
                            &
                            <span class="text-primary products_ratings">...</span> Ratings
                        </p>
                        <p class="title">কমিশন : <span>@php echo (intval($userData['todaysAmount']+$userData['bonusAmount'])/100)*$package_data['commission'] @endphp</span> ৳</p>
                    </div>
                </div>
                <div class="bottom_bottom">
                    <button class="btn btn-success title" id="get_commission">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>আপনার কমিশন সংগ্রহ করুন</span>
                        <i class="fa-solid fa-circle-check"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- script -->
<script src="{{asset('.\js\now\task.js')}}"></script>

@endsection