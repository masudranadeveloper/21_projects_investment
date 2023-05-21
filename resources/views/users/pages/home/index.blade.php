@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\now\home\index.css')}}" />

<section class="index">
    <div class="container">

        @include('users.pages.home.components.slider')

        <!-- header -->
        <div class="body_mr mt-5">

            <div class="container">
                <div class="row">
                    <div style="border-bottom: 2px solid green;" class="col-12 title p-0 mb-3"><span style="border-radius:8px 0 0 0; background:green;padding: 0.5rem;" class="text-light">TRADING</span></div>
        
                    <div class="col-lg-3 col-6 mb-4">
                        <div class="p-1">
                            <img src="{{asset('.\images\home\index\header_1\header_1.jpg')}}" class="mb-2" />
                            <p class="title">কীভাবে এই সাইটে কাজ করতে হয়?</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mb-4">
                        <div class="p-1">
                            <img src="{{asset('.\images\home\index\header_1\header_2.jpg')}}" class="mb-2" />
                            <p class="title">কত টাকা হলে টাকা উত্তলন করতে পারবো?</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mb-4">
                        <div class="p-1">
                            <img src="{{asset('.\images\home\index\header_1\header_3.jpg')}}" class="mb-2" />
                            <p class="title">ফ্রীতে কত দিন কাজ করতে পারবো?</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mb-4">
                        <div class="p-1">
                            <img src="{{asset('.\images\home\index\header_1\header_4.jpg')}}" class="mb-2" />
                            <p class="title">ফ্রীতে কাজ করে কী টাকা উত্তলন করা যায়?</p>
                        </div>
                    </div>
        
                </div>
            </div>
    
            <div class="container">
                <div class="row mt-3">
                    <div style="border-bottom: 2px solid red" class="col-12 title p-0 mb-3"><span style="background:red;padding: 0.5rem;" class="text-light">LATEST</span></div>
        
                    <div style="border-bottom: 1px solid var(--border-color)" class="col-12 mb-3">
                        <div class="p-1">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{asset('.\images\home\index\grabing.jpg')}}" class="mb-2" />
                                </div>
                                <div class="col-6">
                                    <p class="title mb-3">কীভাবে সাইটে গ্রাবিং করা হয়?</p>
                                    <p style="font-size: 1.2rem" class="title text-warning">তারিখ : ১২ মার্চ, ২০২২</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="border-bottom: 1px solid var(--border-color)" class="col-12 mb-3">
                        <div class="p-1">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{asset('.\images\home\index\create_account.jpg')}}" class="mb-2" />
                                </div>
                                <div class="col-6">
                                    <p class="title mb-3">কীভাবে সাইটে একাউন্ট খুলতে হয়?</p>
                                    <p style="font-size: 1.2rem" class="title text-warning">তারিখ : ১৫ মার্চ, ২০২২</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="border-bottom: 1px solid var(--border-color)" class="col-12 mb-3">
                        <div class="p-1">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{asset('.\images\home\index\ban.JPG')}}" class="mb-2" />
                                </div>
                                <div class="col-6">
                                    <p class="title mb-3">একাউন্ট ব্যান হয়ার কী কী কারন আছে?</p>
                                    <p style="font-size: 1.2rem" class="title text-warning">তারিখ : ২০ মার্চ, ২০২২</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="border-bottom: 1px solid var(--border-color)" class="col-12 mb-3">
                        <div class="p-1">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{asset('images\home\index\telegrame.png')}}" class="mb-2" />
                                </div>
                                <div class="col-6">
                                    <p class="title mb-3">কীভাবে সাইটের অফিসিয়াল গ্রুফে যুক্ত হবো?</p>
                                    <p style="font-size: 1.2rem" class="title text-warning">তারিখ : ২১ মার্চ, ২০২২</p>
                                </div>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>

    </div>
</section>

@include('users.layout.footer2')
@endsection
