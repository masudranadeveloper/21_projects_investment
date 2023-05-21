@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\personal\personal.css')}}?v={{Config('app.version')}}" />

<section id="personal_section" style="margin-bottom: 15rem !important">
    
    <div class="container">

        <div class="bg_color"></div>

        <div class="users_details">
            <div class="left">
                <div class="left_left">
                    <img src="{{asset('./images/users_profile/'.$userData['picture'])}}" />
                </div>
                <div class="left_right">
                    <p class="title">{{__('profile.username')}} : {{$userData['fName']}} {{$userData['lName']}}</p>
                    <p class="title">{{$userData['mobileNumber']}}</p>
                    <p class="title">আপনাকে অভিনন্দন</p>
                </div>
            </div>

            <div class="right">
            </div>
        </div>

        <div class="box_r profile_user_details">
            <div class="top">
                <div class="left title">
                    মোট অর্থ : <span class="text-success">{{$userData['totalAmount']}}</span> ৳
                </div>

                <div class="right">
                    <a href="{{route('api_users_logout')}}" class="withdraw title btn btn-danger">LOGOUT</a>
                </div>
            </div>

            <div class="middle">
                <p class="title">বোনাস : <span class="text-warning">{{$userData['bonusAmount']}}</span> ৳</p>
            </div>

            <div class="middle">
                <p class="title">দল থেকে মোট আয় : <span class="text-warning">{{$userData['totalTeamRevenue']}}</span> ৳</p>
            </div>

            <div class="bottom mt-5">
                <div class="box">
                    <p class="title">কাজ থেকে মোট আয়</p>
                    <p class="title"><span class="text-primary">{{$userData['totalTaskIncome']}}</span> ৳</p>
                </div>
                <div class="box">
                    <p class="title">কাজ থেকে আজকের আয়</p>
                    <p class="title"><span class="text-primary">{{$userData['todayIncome']}}</span> ৳</p>
                </div>
                <div class="box">
                    <p class="title">কাজ থেকে গতকালের আয়</p>
                    <p class="title"><span class="text-primary">{{$userData['easterdayIncome']}}</span> ৳</p>
                </div>
            </div>
        </div>

        <div style="border: none;margin-top: 3rem;" class="menu_btn_wrapper box_r">
            <div class="menu_btn_wrapper_all_menu">
                <a href="{{route('web_deposit_show')}}" class="mb-4 menu_btn_wrapper_box">
                    <img src="{{asset('.\images\icons\deposit.png')}}" />
                    <h2 class="title">ডিপজিট</h2>
                </a>

                <a href="{{route('web_withdraw_show')}}" class="mb-4 menu_btn_wrapper_box">
                    <img src="{{asset('.\images\icons\withdraw.png')}}" />
                    <h2 class="title">উত্তোলন</h2>
                </a>
                
                <a href="{{route('web_invite_show')}}" class="mb-4 menu_btn_wrapper_box">
                    <img src="{{asset('.\images\icons\invite.png')}}" />
                    <h2 class="title">{{__('all_btn.Invite')}}</h2>
                </a>
            </div>
        </div>

        <div class="redeem_code box_r">
            <a href="{{route('web_personal_gift')}}">
                <img src="{{asset('.\images\icons\gift.jpg')}}" />
                <h2 class="title text-dark">{{__('profile.redeem_code')}}</h2>
            </a>
        </div>

        <div class="personal_info_btn">

            <a href="{{route('web_history_task_today_show')}}" class="box_r">
                <div class="details">
                    <img src="{{asset('.\images\icons\history.png')}}" />
                    <h2 class="title">{{__('profile.all_history')}}</h2>
                </div>
                <i class="fa-solid fa-arrow-right-to-bracket header"></i>
            </a>

            <a href="{{route('web_personal_team_report')}}" class="box_r">
                <div class="details">
                    <img src="{{asset('.\images\icons\team_report.png')}}" />
                    <h2 class="title">{{__('profile.Team_Report')}}</h2>
                </div>
                <i class="fa-solid fa-arrow-right-to-bracket header"></i>
            </a>

            <a href="{{route('web_personal_team_member', ['id' => '1'])}}" class="box_r">
                <div class="details">
                    <img src="{{asset('.\images\icons\team_member.png')}}" />
                    <h2 class="title">{{__('profile.Your_Team_Member')}}</h2>
                </div>
                <i class="fa-solid fa-arrow-right-to-bracket header"></i>
            </a>
      
            <a href="{{route('web_history_account_deposit')}}" class="box_r">
                <div class="details">
                    <img src="{{asset('.\images\icons\deposit_history.png')}}" />
                    <h2 class="title">{{__('profile.Deposit_History')}}</h2>
                </div>
                <i class="fa-solid fa-arrow-right-to-bracket header"></i>
            </a>

            <a href="{{route('web_history_account_withdraw')}}" class="box_r">
                <div class="details">
                    <img src="{{asset('.\images\icons\withdraw_history.png')}}" />
                    <h2 class="title">{{__('profile.Withdraw_History')}}</h2>
                </div>
                <i class="fa-solid fa-arrow-right-to-bracket header"></i>
            </a>

            <a href="{{route('web_personal_info')}}" class="box_r">
                <div class="details">
                    <img src="{{asset('.\images\icons\personal_info.png')}}" />
                    <h2 class="title">{{__('profile.Personal_Info')}}</h2>
                </div>
                <i class="fa-solid fa-arrow-right-to-bracket header"></i>
            </a>

        </div>
    </div>
</section>

@endsection
