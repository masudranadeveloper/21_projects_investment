<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_withdraw;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\user_recharge;
use App\Models\balance_history;

class backend_withdraw_controller extends Controller
{
    // withdraw_submit
    public function withdraw_submit(Request $req)
    {
        $data = $req -> all();
        $adminData = admin_account::where('id', 1) -> first();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        $withdraw_amount = $data['amount'];
        /*
        =================
            validation
        =================
        */
        // min withdraw 
        if(intval($withdraw_amount) < intval($adminData['minWithdraw'])){
            return response()->json(['st' => false, 'msg' => "<p class='title'>আপনি সর্বনিম্ন ".$adminData['minWithdraw'].' টাকা উত্তলন করতে পারবেন।</p>']);

            return false;
        }
        // account balance 
        if(intval($withdraw_amount) > intval($userData['totalAmount'])){
            return response()->json(['st' => false, 'msg' => "<p class='title'>আপনার একাউন্টে পর্যাপ্ত পরিমান অর্থ নেই।</p>"]);

            return false;
        }
        // any pending withdraw 
        if(user_withdraw::where('userID', $userData['id'])->where('st', 'pending')->exists()){
            return response()->json(['st' => false, 'msg' => "<p class='title'>আপনার ইতমধ্যেই একটি উত্তলন পেন্ডিং রয়েছে।</p>"]);

            return false;
        }
        // next withdraw
        if(intval($userData['nextWithdraw']) > intval(time()) ){
            $secound_difarence = $userData['nextWithdraw']-time();
            $houres_later = ($secound_difarence/60)/60;
            return response()->json(['st' => false, 'msg' => "<p class='title'>আপনার পরবর্তী উত্তলন ".number_format($houres_later)." ঘন্টা পরে!</p>"]);

            return false;
        }
        // any deposit
        if(user_recharge::where('userID', $userData['id'])->where('st', 'success')->count() < 1){
            return response()->json(['st' => false, 'msg' => "<p class='title'>টাকা উত্তলনের জন্য আপনাকে সর্বনিম্ন ".$adminData['minDeposit'].' টাকা ডিপজিট করতে হবে</p>']);

            return false;
        }

        $db = new user_withdraw;
        $db -> amount = $data['amount'];
        $db -> userID = $userData['id'];
        $db -> orderID = uniqid();
        $db -> method = $data['method'];
        $db -> address = $data['address'];
        $db -> st = 'pending';
        $db -> save();

        $bl_his_with = new balance_history;
        $bl_his_with -> userID = $userData['id'];
        $bl_his_with -> msg = '<p class="lose">আপনি <span class="amount">'.$data['amount'].'</span> টাকা সফলভাবে উত্তলন করেছেন। <span><i class="fa-solid fa-face-frown"></i></span></p>';
        $bl_his_with -> save();

        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            'totalAmount' => $userData['totalAmount'] - $withdraw_amount,
            'todaysAmount' => $userData['todaysAmount'] - $withdraw_amount,
            'nextWithdraw' => time()+$adminData['nextWIthdraw'],
        ]);

        return response()->json(['st' => true, 'msg' => "<p class='title'>আপনি সফলভাবে আপনার টাকাগুলো উত্তলন করেছেন। দয়া করে ২৪ ঘন্টা অপেক্ষা করুন।</p><p class='title'>আপনি ".$withdraw_amount." টাকা উত্তলন করেছেন ".$adminData['withdraw_charge']."% ভ্যাট এ আপনার প্রাপ্য অর্থ ".$withdraw_amount-(($adminData['withdraw_charge']/100)*$withdraw_amount)." টাকা।</p>"]);
    }
}
