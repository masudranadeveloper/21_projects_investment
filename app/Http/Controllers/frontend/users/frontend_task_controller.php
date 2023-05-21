<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\user_package;
class frontend_task_controller extends Controller
{
    // task_show
    public function task_show(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        $package_data = user_package::orderBy('minAmount', 'ASC') -> where('minAmount', '<=', intval($userData['totalAmount'])) -> where('maxAmount', '>=', intval($userData['totalAmount'])) -> first();

        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            'vipBase' => $package_data['package_name']
        ]);

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


        $package_data_first = user_package::orderBy('minAmount', 'ASC') -> first();
        $compact = compact( 'userData', 'package_data', 'package_data_first');
        return view('users.pages.task.task') -> with($compact);
    }
}
