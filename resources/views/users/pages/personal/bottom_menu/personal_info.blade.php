@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\personal\profile_bottom\profile_info.css')}}">

<section id="persona_info" style="margin-bottom: 14rem">
    <div class="container">
        <div class="header_mr">
            <h2 class="main-header">PERSONAL INFO</h2>
        </div>

        {{-- body_mr --}}
        <div class="body_mr">
            <div class="profile_pic">
                <img src="{{asset('.\images\users_profile\users.jpg')}}" alt="">
                <button class="btn btn-primary title">Change Your Picture</button>
            </div>

            <form action="" method="post">
                <div class="row mt-5">
                    <div class="col-6">
                        <p class="title">First name</p>
                        <input type="text" name="" id="" class="title" placeholder="First name...">
                    </div>
                    <div class="col-6">
                        <p class="title">Last name</p>
                        <input type="text" name="" id="" class="title" placeholder="Last name...">
                    </div>
                    <div class="col-12 mt-4">
                        <p class="title">Mobile number</p>
                        <input type="text" name="" id="" class="title" placeholder="Mobile number...">
                    </div>
                    <div class="col-12 mt-4">
                        <p class="title">Your email</p>
                        <input type="text" name="" id="" class="title" placeholder="Your email...">
                    </div>
                    <div class="col-6 mt-5">
                        <button class="btn btn-success title">Save Changes</button>
                    </div>
                </div>
            </form>

            <form action="" method="post">
                <div class="row mt-5">
                    <div class="col-12 mt-4">
                        <p class="title">Your old password</p>
                        <input type="text" name="" id="" class="title" placeholder="Your old password...">
                    </div>
                    <div class="col-12 mt-4">
                        <p class="title">Your new password</p>
                        <input type="text" name="" id="" class="title" placeholder="Your new password...">
                    </div>
                    <div class="col-6 mt-5">
                        <button class="btn btn-success title">Save Changes</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>

<!-- hidden  -->
<div class="hidden_notice d-none">
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
                        আপনি যদি আমাদের পরবর্তী কোন গেমস আনবো এই টুর্নামেন্ট এ জয়েন হতে চান নিচে থাকা জয়েন বাটনে ক্লিক করুন।
                    </h4>
                    <h4 class="title">
                        আপনি চাইলে ২০ টাকা দিয়ে ৬০ টাকা ইনকাম করতে পারেন।(শর্ত প্রযোজ্য)
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

@endsection