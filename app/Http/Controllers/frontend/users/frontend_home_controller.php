<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\user_package;

class frontend_home_controller extends Controller
{
    public function home_show(Request $req)
    {
        $adminData = admin_account::where('id', 1)->first();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        $package_data = user_package::orderBy('minAmount', 'ASC') -> where('minAmount', '<=', intval($userData['totalAmount'])) -> where('maxAmount', '>=', intval($userData['totalAmount'])) -> first();

        if($userData['refreshDay'] < time()){
            user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                "todayIncome" =>'00',
                "todayRaferIncome" =>'00',
                "todaysRechargeIncome" =>'00',
                "easterdayIncome" =>$userData['easterdayIncome']+$userData['todayIncome'],
                "easterdayRaferIncome" =>$userData['easterdayRaferIncome']+$userData['todayRaferIncome'],
                "easterdayRechargeIncome" =>$userData['easterdayRechargeIncome']+$userData['todaysRechargeIncome'],
                "task" => $package_data['task'],
                "todaysAmount" => $userData['totalAmount'],
                "refreshDay" => strtotime(date('d M Y')." 11:59:59pm"),
            ]);
        }
        $compact = compact('adminData');
        return view('users.pages.home.home') -> with($compact);
    }
    
    // index_show
    public function index_show()
    {
        return view('users.pages.home.index');
    }

    // invite_show
    public function invite_show(Request $req)
    {
        $admin_data = admin_account::where('id', 1)->first();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $compact = compact('admin_data', 'userData');
        return view('users.pages.home.others.invite') -> with($compact);
    }

    // deposit_show
    public function deposit_show()
    {
        $adminData = admin_account::where('id', 1)->first();
        $compact = compact('adminData');
        return view('users.pages.home.balance.deposit') -> with($compact);
    }

    // deposit_show
    public function withdraw_show()
    {
        $adminData = admin_account::where('id', 1)->first();
        $compact = compact('adminData');
        return view('users.pages.home.balance.withdraw') -> with($compact);
    }

    // info_show
    public function info_show()
    {
        $adminData = admin_account::where('id', 1)->first();
        $compact = compact('adminData');
        return view('users.pages.home.others.info') -> with($compact);
    }

    // company_show
    public function company_show()
    {
        return view('users.pages.home.others.company');
    }
}
