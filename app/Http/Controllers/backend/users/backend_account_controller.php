<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\admin_account;
use Illuminate\Support\Facades\Hash;

class backend_account_controller extends Controller
{
    //users_accounts_signup_check
    public function users_accounts_signup_check(Request $req)
    {
        $data = $req -> all();
        // username
        if(user_account::where('userName', $data['username'])->exists()){
            return response()->json(['username' => 'This username is already exists!']);
            return false;
        }
        // number
        if(user_account::where('mobileNumber', $data['number'])->exists()){
            return response()->json(['number' => 'This number is already exists!']);
            return false;
        }
        // invite
        if(!empty($data['invite']) && user_account::where('invite', '==', '1')->exists()){
            return response()->json(['invite' => 'Invalid invitation code!']);
            return false;
        }
        // password
        if($data['password'] != $data['con_password']){
            return response()->json(['password' => "Your confirmed password doesn't match!"]);
            return false;
        }
        return response()->json(['st' => true]);
    }

    //users_accounts_signup_insert
    public function users_accounts_signup_insert(Request $req)
    {
        $base64Image = $req->input('img');
        $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
        $imageData = base64_decode($base64Image);
        $fileName = uniqid() . '.png';
        $filePath = 'images/users_profile/' . $fileName;
        file_put_contents(public_path($filePath), $imageData);

        $adminData = admin_account::where('id', 1)->first();
        $data = $req -> all();
        // =========with invitation code=========
        if(!empty($data['invite'])){
            // find user
            $invitorData = user_account::where('invite', $data['invite']) -> first();

            $csrf = Hash::make(time().$data['number']);
            $db = new user_account;
            $db -> fName = $data['fName'];
            $db -> lName = $data['lName'];
            $db -> userName = $data['username'];
            $db -> mobileNumber = $data['number'];
            $db -> email = $data['username'].'@gmail.com';
            $db -> password = $data['password'];
            $db -> picture = $fileName;
            $db -> invite = time();
            $db -> bonusAmount = $adminData['offer_balance'];
            // invitor st

            // 1st gen
            $db -> gen1st = $data['invite'];
            // 2nd gen
            $db -> gen2nd = $invitorData['gen1st'];
            // 3rd gen
            $db -> gen3rd = $invitorData['gen2nd'];
            // 4th gen
            $db -> gen4th = $invitorData['gen3rd'];
            // 5th gen
            $db -> gen5th = $invitorData['gen4th'];

            // invitor end
            $db -> csrf = $csrf;
            $db -> save();

            $req -> session() -> put('csrf', $csrf);
            return response()->json(['st' => true]);
        }
        // =========with out invitation code=========
        else{
            $csrf = Hash::make(time().$data['number']);

            $db = new user_account;
            $db -> fName = $data['fName'];
            $db -> lName = $data['lName'];
            $db -> userName = $data['username'];
            $db -> mobileNumber = $data['number'];
            $db -> email = $data['username'].'@gmail.com';
            $db -> password = $data['password'];
            $db -> invite = time();
            $db -> picture = $fileName;
            $db -> csrf = $csrf;
            $db -> bonusAmount = $adminData['offer_balance'];
            if($db -> save()){
                $req -> session() -> put('csrf', $csrf);
                return response()->json(['st' => true]);
            }
        }
    }
    // users_accounts_login
    public function users_accounts_login(Request $req)
    {
        $data = $req -> all();
        $userNameCpont = user_account::where('userName', $data['userName']) -> count();
        if($userNameCpont > 0){
            $userData = user_account::where('userName', $data['userName']) -> where('password', $data['password']) -> first();
            $userDataCount = user_account::where('userName', $data['userName']) -> where('password', $data['password']) -> count();
            if($userDataCount > 0){
                if($userData['accSt'] == 'ban'){
                    return response()->json(['st' => false, 'password' => "Your account has ban, contact us!"]);
                }
                $csrf = Hash::make(time().$data['userName']);
                $req -> session() -> put('csrf', $csrf);
                user_account::where('id', $userData['id']) -> update(['csrf' =>  $csrf]);
                return response()->json(['st' => true]);
            }else{
                return response()->json(['st' => false, 'password' => "Your password couldn't match!"]);
            }
        }else{
            return response()->json(['st' => false, 'username' => "Your username couldn't match!"]);
        }
    }

    // users_logout
    public function users_logout(Request $req)
    {
        $req -> session() -> forget('csrf');
        return back();
    }

}
