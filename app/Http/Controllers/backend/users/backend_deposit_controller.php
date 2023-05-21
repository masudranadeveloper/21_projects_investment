<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_recharge;
use App\Models\user_account;
use App\Models\admin_account;

class backend_deposit_controller extends Controller
{
    // deposit_submit
    public function deposit_submit(Request $req)
    {
        $data = $req -> all();

        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        $adminData = admin_account::where('id', 1)->first();

        if($adminData['minDeposit'] > $data['amount']){
            return back() -> with('msg', 'আমাদের সাইটের মিনিমান ডিপজিট '.$adminData['minDeposit'].' টাকা!');
            return false;
        }

        if(user_recharge::where('userID', $userData['id']) -> where('st', 'pending') -> exists()){
            return back() -> with('msg', 'আপনার একটি ডিপজিট রিকুয়েস্ট ইতিমধ্যেই পেন্ডিং রয়েছে!');
            return false;
        }

        // picture
        $pic = $req -> file('img');
        $pic_name = time().$pic -> getClientOriginalName();
        $pic -> move('images/deposit', $pic_name);

        $db = new user_recharge;
        $db -> img = $pic_name;
        $db -> amount = $data['amount'];
        $db -> userID = $userData['id'];
        $db -> orderID = uniqid();
        $db -> method = $data['method'];
        $db -> tranx = $data['tranx'];
        $db -> st = 'pending';
        $db -> save();
        return back() -> with('msg', 'পরবর্তী ৩০ মিনিটের মধ্যেই আপনার রিকুয়েস্টটি গ্রহন করা হবে।');
    }
}
