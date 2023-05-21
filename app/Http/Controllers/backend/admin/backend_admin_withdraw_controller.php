<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_withdraw;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\balance_history;

class backend_admin_withdraw_controller extends Controller
{
    // withdraw_success
    public function withdraw_success($id)
    {
        $adminData = admin_account::where('id', 1)->first();
        $withdraw_data = user_withdraw::where('id', $id) -> first();
        $userData = user_account::findOrFail($withdraw_data['userID']);

        // r_amount
        $r_amount = $withdraw_data['amount'];
        $avalable_amount = $r_amount-(($r_amount*$adminData['withdraw_charge'])/100);

        admin_account::where('id', 1)->update([
            "available_amount" => $adminData['available_amount'] - ($avalable_amount+5),
        ]);
        // user update 
        user_account::where('id', $withdraw_data['userID'])->update([
            'totalWithdraw' => $userData['totalWithdraw'] + $r_amount,
        ]);

        user_withdraw::where('id', $id) -> update([
            "st" => "success"
        ]);

        // admin avilable 
        $admin_available = new balance_history;
        $admin_available->userID = $userData['id'];
        $admin_available->msg = 'Withdraw user => '.$withdraw_data['userID'].' || Type => Deposit || Available Amount => '.$adminData['available_amount'].'-'.($avalable_amount+5).'='.($adminData['available_amount'] - ($avalable_amount+5));
        $admin_available->type = 'calculation';
        $admin_available->save();

        return back() -> with('msg', 'Withdraw Request successfully done!');
    }

    // withdraw_undo
    public function withdraw_undo($id)
    {
        $adminData = admin_account::where('id', 1)->first();
        $withdraw_data = user_withdraw::where('id', $id) -> first();
        $userData = user_account::findOrFail($withdraw_data['userID']);

        // r_amount
        $r_amount = $withdraw_data['amount'];
        $avalable_amount = $r_amount-(($r_amount*$adminData['withdraw_charge'])/100);

        admin_account::where('id', 1)->update([
            "available_amount" => $adminData['available_amount'] + ($avalable_amount+5),
        ]);
        // user update 
        user_account::where('id', $withdraw_data['userID'])->update([
            'totalWithdraw' => $userData['totalWithdraw'] - $r_amount,
        ]);

        user_withdraw::where('id', $id) -> update([
            "st" => "pending"
        ]);

        // admin avilable 
        $admin_available = new balance_history;
        $admin_available->userID = $userData['id'];
        $admin_available->msg = 'Withdraw user => '.$withdraw_data['userID'].' || Type => Deposit || Available Amount => '.$adminData['available_amount'].'+'.($avalable_amount+5).'='.($adminData['available_amount'] + ($avalable_amount+5));
        $admin_available->type = 'calculation';
        $admin_available->save();

        return back() -> with('msg', 'Withdraw Request successfully done!');
    }
    // withdraw_rejected
    public function withdraw_rejected($id)
    {
        $withdrawData = user_withdraw::where('id', $id) -> first();
        $userData = user_account::findOrFail($withdrawData['userID']);
        
        $withdraw_amount = $withdrawData['amount'];
        
        user_account::where('id', $withdrawData['userID']) -> update([
            'totalAmount' => $userData['totalAmount'] + $withdraw_amount,
            'todaysAmount' => $userData['todaysAmount'] + $withdraw_amount,
            'nextWithdraw' => '00',
        ]);
        
        $bl_his_with = new balance_history;
        $bl_his_with -> userID = $userData['id'];
        $bl_his_with -> msg = '<p class="win">আপনার <span class="amount">'.$withdraw_amount.'</span> টাকা উত্তলন বাতিল করা হয়েছে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
        $bl_his_with -> save();

        user_withdraw::where('id', $id) -> update([
            "st" => "rejected"
        ]);
        return back() -> with('msg', 'Withdraw Request successfully rejected!');
    }
}
