<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;

class backend_personal_controller extends Controller
{
    // personal_data_up
    public function personal_data_up(Request $req)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $data = $req -> all();

        if(!empty($req -> file('file'))){
            $pic = $req -> file('file');
            $pic_name = time().$pic -> getClientOriginalName();
            $pic -> move('images\users', $pic_name);
        }else{
            $pic_name = $userData['picture'];
        }
        
        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            "fName" => $data['fName'],
            "lName" => $data['lName'],
            "picture" => $pic_name,
        ]);

        return redirect(route('success_show', ['msg' => 'Your personal data successfully updated!']));
    }
    // update_users_data
    public function update_users_data(Request $req)
    {
        $data = $req -> all();
        if($data['type'] == "username"){
            if(user_account::where('userName', $data['data']) -> exists()){
                return response() -> json(['st' => false, 'data' => 'Username is already exists!']);
            }else{
                user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                    "userName" => $data['data'],
                ]);
                return response() -> json(['st' => true, 'data' => 'Username successfully update!']);
            }
            
        }else if($data['type'] == "password"){
            user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                "password" => $data['data'],
            ]);
            return response() -> json(['st' => true, 'data' => 'Password successfully update!']);
        }else if($data['type'] == "number"){
            if(user_account::where('mobileNumber', $data['data']) -> exists()){
                return response() -> json(['st' => false, 'data' => 'Number is already exists!']);
            }else{
                user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                    "mobileNumber" => $data['data'],
                ]);
                return response() -> json(['st' => true, 'data' => 'Number successfully update!']);
            }
        }
        else{
            if(user_account::where('email', $data['data']) -> exists()){
                return response() -> json(['st' => false, 'data' => 'Email is already exists!']);
            }else{
                user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                    "email" => $data['data'],
                ]);
                return response() -> json(['st' => true, 'data' => 'Email successfully update!']);
            }
        }
        
    }
    
}
