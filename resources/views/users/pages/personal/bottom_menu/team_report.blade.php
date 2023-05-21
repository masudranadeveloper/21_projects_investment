@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\personal\profile_bottom\team_report.css')}}?v={{Config('app.version')}}">
<section id="team_section" class="mb-5">
    <div class="container">
        
        <div class="header_mr">
            <h2 class="main-header">টিম রিপোর্ট</h2>
        </div>

        <div class="team_report_wrapper">
            <li>
                <span class="header text-center">
                    Team Total Deposit
                </span>

                <span class="title text-center">
                    {{$totalDeposit}} bdt
                </span>
            </li>
            <li>
                <span class="header text-center">
                    Team Total Withdraw
                </span>
                <span class="title text-center">
                    {{$totalWithdraw}} bdt
                </span>
            </li>
            <li>
                <span class="header text-center">
                    Total Team Amount
                </span>

                <span class="title text-center">
                    {{$totalAmount}} bdt
                </span>
            </li>
            <li>
                <span class="header text-center">
                    Total Team Member
                </span>
                <span class="title text-center">
                    {{$totalUsers}}
                </span>
            </li>
            <li>
                <span class="header text-center">
                    Total Team Revenue
                </span>

                <span class="title text-center">
                    {{$totalTeamRevenue}} bdt
                </span>
            </li>
            <li>
                <span class="header text-center">
                    Total Generation Commission (<span class="title">Team</span>)
                </span>
                <span class="title text-center">
                    {{$totalGenCommission}} bdt
                </span>
            </li>
        </div>

    </div>
</section>
@endsection