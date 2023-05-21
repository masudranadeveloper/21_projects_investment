<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;

class frontend_personal_controller extends Controller
{
    // personal_show
    public function personal_show(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $compact = compact('userData');
        return view('users.pages.personal.personal') -> with($compact);
    }

    // personal_info
    public function personal_info()
    {
        return view('users.pages.personal.bottom_menu.personal_info');
    }

    // personal_team_report
    public function personal_team_report(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $totalDeposit = user_account::where('gen1st', $userData['invite'])
        -> orWhere('gen2nd', $userData['invite'])
        -> orWhere('gen3rd', $userData['invite'])
        -> orWhere('gen4th', $userData['invite'])
        -> orWhere('gen5th', $userData['invite'])
        -> sum('totalDeposit');
        $totalWithdraw = user_account::where('gen1st', $userData['invite'])
        -> orWhere('gen2nd', $userData['invite'])
        -> orWhere('gen3rd', $userData['invite'])
        -> orWhere('gen4th', $userData['invite'])
        -> orWhere('gen5th', $userData['invite'])
        -> sum('totalWithdraw');
        $totalUsers = user_account::where('gen1st', $userData['invite'])
        -> orWhere('gen2nd', $userData['invite'])
        -> orWhere('gen3rd', $userData['invite'])
        -> orWhere('gen4th', $userData['invite'])
        -> orWhere('gen5th', $userData['invite'])
        -> count();
        $totalTeamRevenue = user_account::where('gen1st', $userData['invite'])
        -> orWhere('gen2nd', $userData['invite'])
        -> orWhere('gen3rd', $userData['invite'])
        -> orWhere('gen4th', $userData['invite'])
        -> orWhere('gen5th', $userData['invite'])
        -> sum('totalTeamRevenue');
        $totalGenCommission = user_account::where('gen1st', $userData['invite'])
        -> orWhere('gen2nd', $userData['invite'])
        -> orWhere('gen3rd', $userData['invite'])
        -> orWhere('gen4th', $userData['invite'])
        -> orWhere('gen5th', $userData['invite'])
        -> sum('totalTaskIncome');
        $totalAmount = user_account::where('gen1st', $userData['invite'])
        -> orWhere('gen2nd', $userData['invite'])
        -> orWhere('gen3rd', $userData['invite'])
        -> orWhere('gen4th', $userData['invite'])
        -> orWhere('gen5th', $userData['invite'])
        -> sum('totalAmount');

        $compact = compact('totalAmount', 'totalDeposit', 'totalWithdraw', 'totalUsers', 'totalTeamRevenue', 'totalGenCommission');
        return view('users.pages.personal.bottom_menu.team_report') -> with($compact);
    }

    // personal_team_member
    public function personal_team_member(Request $req, $id)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();

        if($id == '1'){
            $data = user_account::where('invite', $userData['gen1st'])->get();
        }else if($id == '2'){
            $data = user_account::where('invite', $userData['gen2nd'])->get();
        }else if($id == '3'){
            $data = user_account::where('invite', $userData['gen3rd'])->get();
        }else if($id == '4'){
            $data = user_account::where('invite', $userData['gen4th'])->get();
        }else{
            $data = user_account::where('invite', $userData['gen5th'])->get();
        }

        $compact = compact('id', 'data');
        return view('users.pages.personal.bottom_menu.team_member') -> with($compact);
    }

    // personal_gift
    public function personal_gift()
    {
        return view('users.pages.personal.others.gift');
    }
}
