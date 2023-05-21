@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\contact\contact.css')}}?v={{Config('app.version')}}">

<section id="contact_section" style="margin-bottom: 14rem">
    <div class="container">
        <div class="header_mr">
            <h2 class="main-header">যোগাযোগ</h2>
        </div>

        {{-- body_mr --}}
        <div class="body_mr">
            <div class="items">
                <h2 class="header">টেলিগ্রাম গ্রুপ</h2>
                <i class="fa-solid fa-share header"></i>
            </div>
            <div class="items">
                <h2 class="header">পাসওয়ার্ড রিসেট(এজেন্ট)</h2>
                <i class="fa-solid fa-share header"></i>
            </div>
            <div class="items">
                <h2 class="header">সাইটের তথ্য(এজেন্ট)</h2>
                <i class="fa-solid fa-share header"></i>
            </div>
        </div>

    </div>
</div>

@endsection
