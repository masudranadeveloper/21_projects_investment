<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_package;
use App\Models\user_account;
use App\Models\package_history;
use App\Models\admin_account;
use App\Models\balance_history;

class backend_packages_controller extends Controller
{
    // get_package_data
    public function get_package_data (Request $req, $data)
    {
        $data_g = user_package::where('type', $data) -> orderBy('package_name', 'ASC') -> get();
        $dataCount = user_package::where('type', $data) -> orderBy('package_name', 'ASC') -> count();
        if($dataCount > 0){
            return response()->json(['st' => true,'data' =>  $data_g]);
        }else{
            return response()->json(['st' => false]);
        }
    }

    // buy_package_data
    public function buy_package_data(Request $req)
    {
        $data = $req -> all();
        $package_data = user_package::where('id', $data['id']) -> first();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        if($package_data['amount'] <= $userData['totalAmount'] ){
            if(package_history::where('pk_type', $package_data['type']) -> where('st', 'active') -> where('user_id', $userData['id']) -> exists()){
                return response() -> json(['st' => false, 'data' => 'You are already work in this platform!']);
            }else{
                if(package_history::where('pk_id', $data['id']) -> where('st', 'active') -> where('user_id', $userData['id']) -> exists()){
                    return response() -> json(['st' => false, 'data' => 'You are already purchase this package!']);
                }else{
                    user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                        'totalAmount' => $userData['totalAmount'] - $package_data['amount'],
                        'holdAmount' => $userData['holdAmount'] + $package_data['amount'],
                        'todaysAmount' => intval($userData['todaysAmount']) - intval($package_data['amount']),
                    ]);
    
                    $db = new package_history;
                    $db -> available_task = $package_data['task'];
                    $db -> pk_type = $package_data['type'];
                    $db -> user_id = $userData['id'];
                    $db -> pk_id = $data['id'];
                    $db -> st = 'active';
                    $db -> save();
                    return response() -> json(['st' => true]);
                }
            }
            
        }else{
            return response() -> json(['st' => false, 'data' => "You don't have sufficient balance!"]);
        }
    }
    // upgrade_package_data 
    public function upgrade_package_data(Request $req, $pk_id)
    {
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $pk_data = user_package::findOrFail($pk_id);
        $pk_hi_data = package_history::where('st', 'active') -> where('user_id', $userData['id']) -> where('pk_type', $pk_data['type']) -> first();
        $active_pk_data = user_package::findOrFail($pk_hi_data['pk_id']);

        if($userData['totalAmount'] < ($pk_data['amount']-$active_pk_data['amount'])){
            return response() -> json(['st' => false, 'data' => "You don't have sufficient balance!"]);
            return false;
        }
        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            'totalAmount' => $userData['totalAmount'] - ($pk_data['amount']-$active_pk_data['amount']),
            'holdAmount' => $userData['holdAmount'] + ($pk_data['amount']-$active_pk_data['amount']),
            'todaysAmount' => $userData['todaysAmount'] - ($pk_data['amount']-$active_pk_data['amount'])
        ]);
        package_history::where('id', $pk_hi_data['id']) -> update([
            'st' => 'cancelled'
        ]);
        $db = new package_history;
        $db -> available_task = $pk_data['task'];
        $db -> pk_type = $pk_data['type'];
        $db -> user_id = $userData['id'];
        $db -> pk_id = $pk_data['id'];
        $db -> st = 'active';
        $db -> save();
        return response() -> json(['st' => true]);
    }

    // package_cancelled
    public function package_cancelled(Request $req, $pk_id, $pk_hi_id)
    {
        $pk_hi_data = package_history::findOrFail($pk_hi_id);
        if($pk_hi_data['st'] != "active"){
            return false;
        }

        $package_data = user_package::findOrFail($pk_id);
        $userData = user_account::where('csrf', $req -> session() -> get('csrf'))->first();
        $adminData = admin_account::where('id', 1)->first();

        $thirt_amount = $package_data['amount'] - ((intval($package_data['amount'])*$adminData['cancal_fee'])/100);
        user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
            'totalAmount' => $userData['totalAmount'] + $thirt_amount,
            'holdAmount' => intval($userData['holdAmount']) - intval($package_data['amount']),
            'todaysAmount' => intval($userData['todaysAmount']) + intval($package_data['amount']),
        ]);
        $pk_hi_data = package_history::where('id', $pk_hi_id) -> update([
            'st' => 'cancelled'
        ]);

        return redirect(route('success_show', ['msg' => 'Your package successfully cancelled. Fee '.$adminData['cancal_fee'].'%']));
    }
}
