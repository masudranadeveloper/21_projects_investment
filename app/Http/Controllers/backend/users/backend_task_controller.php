<?php

namespace App\Http\Controllers\backend\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_account;
use App\Models\user_package;
use App\Models\admin_account;
use App\Models\task_products_history;
use App\Models\balance_history;
use App\Models\users_task_history;

class backend_task_controller extends Controller
{
    // task_get_products
    public function task_get_products(Request $req)
    {
        $data = task_products_history::inRandomOrder()->first();
        return response() -> json(['data' => $data]);
    }

    // task_get_commission
    public function task_get_commission(Request $req)
    {
        $data = $req -> all();
        $adminData = admin_account::where('id', 1) -> first();
        $userData = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        $package_data = user_package::orderBy('minAmount', 'ASC') -> where('maxAmount', '>=', intval($userData['totalAmount'])) -> first();

        if($userData['task'] > 0){
            // my_commission
            $my_commission = (intval($userData['todaysAmount']+$userData['bonusAmount'])/100)*$package_data['commission'];
            // user amount update 
            user_account::where('csrf', $req -> session() -> get('csrf')) -> update([
                'totalAmount' => $userData['totalAmount'] + $my_commission,
                'todayIncome' => $userData['todayIncome'] + $my_commission,
                'totalTaskIncome' => $userData['totalTaskIncome'] + $my_commission,
                'task' => $userData['task']-1
            ]);
            $bl_his_my = new balance_history;
            $bl_his_my -> userID = $userData['id'];
            $bl_his_my -> msg = '<p class="win">আপনি <span class="amount">'.$my_commission.'</span> টাকা পেয়েছেন। আমাদের '.$package_data['package_name'].' প্যাকেজ থেকে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
            $bl_his_my -> save();

            $products_data = new users_task_history;
            $products_data -> userID = $userData['id'];
            $products_data -> productID = $data['product_id'];
            $products_data -> commission = $my_commission;
            $products_data -> save();

            // gen1st_commission
            if(!empty($userData['gen1st'])){
                $userData_gen1st =  user_account::where('invite', $userData['gen1st']) -> first();
                $gen1st_commission = ($my_commission/100)*$adminData['taskGen1st'];

                user_account::where('invite', $userData['gen1st']) -> update([
                    'totalAmount' => $userData_gen1st['totalAmount'] + $gen1st_commission,
                    'todaysAmount' => $userData_gen1st['todaysAmount'] + $gen1st_commission,
                    'todayRaferIncome' => $userData_gen1st['todayRaferIncome'] + $gen1st_commission,
                    'totalTeamRevenue' => $userData_gen1st['totalTeamRevenue'] + $gen1st_commission,
                ]);
                $bl_his_gen_1st = new balance_history;
                $bl_his_gen_1st -> userID = $userData_gen1st['id'];
                $bl_his_gen_1st -> msg = '<p class="win">আপনি <span class="amount">'.$gen1st_commission.'</span> টাকা পেয়েছেন। আপনার ১ম জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
                $bl_his_gen_1st -> save();
            }

            // gen2nd_commission
            if(!empty($userData['gen2nd'])){
                $userData_gen2nd =  user_account::where('invite', $userData['gen2nd']) -> first();
                $gen2nd_commission = ($my_commission/100)*$adminData['taskGen2nd'];

                user_account::where('invite', $userData['gen2nd']) -> update([
                    'totalAmount' => $userData_gen2nd['totalAmount'] + $gen2nd_commission,
                    'todaysAmount' => $userData_gen2nd['todaysAmount'] + $gen2nd_commission,
                    'todayRaferIncome' => $userData_gen2nd['todayRaferIncome'] + $gen2nd_commission,
                    'totalTeamRevenue' => $userData_gen2nd['totalTeamRevenue'] + $gen2nd_commission,
                ]);
                $bl_his_gen_2nd = new balance_history;
                $bl_his_gen_2nd -> userID = $userData_gen2nd['id'];
                $bl_his_gen_2nd -> msg = '<p class="win">আপনি <span class="amount">'.$gen2nd_commission.'</span> টাকা পেয়েছেন। আপনার ২য় জেনারেশনেরের সদস্য থেকে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
                $bl_his_gen_2nd -> save();
            }

            // gen3rd_commission
            if(!empty($userData['gen3rd'])){
                $userData_gen3rd =  user_account::where('invite', $userData['gen3rd']) -> first();
                $gen3rd_commission = ($my_commission/100)*$adminData['taskGen3rd'];

                user_account::where('invite', $userData['gen3rd']) -> update([
                    'totalAmount' => $userData_gen3rd['totalAmount'] + $gen3rd_commission,
                    'todaysAmount' => $userData_gen3rd['todaysAmount'] + $gen3rd_commission,
                    'todayRaferIncome' => $userData_gen3rd['todayRaferIncome'] + $gen3rd_commission,
                    'totalTeamRevenue' => $userData_gen3rd['totalTeamRevenue'] + $gen3rd_commission,
                ]);
                $bl_his_gen_3rd = new balance_history;
                $bl_his_gen_3rd -> userID = $userData_gen3rd['id'];
                $bl_his_gen_3rd -> msg = '<p class="win">আপনি <span class="amount">'.$gen3rd_commission.'</span> টাকা পেয়েছেন। আপনার ৩য় জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
                $bl_his_gen_3rd -> save();
            }

            // gen4th_commission
            if(!empty($userData['gen4th'])){
                $userData_gen4th =  user_account::where('invite', $userData['gen4th']) -> first();
                $gen4th_commission = ($my_commission/100)*$adminData['taskGen4th'];

                user_account::where('invite', $userData['gen4th']) -> update([
                    'totalAmount' => $userData_gen4th['totalAmount'] + $gen4th_commission,
                    'todaysAmount' => $userData_gen4th['todaysAmount'] + $gen4th_commission,
                    'todayRaferIncome' => $userData_gen4th['todayRaferIncome'] + $gen4th_commission,
                    'totalTeamRevenue' => $userData_gen4th['totalTeamRevenue'] + $gen4th_commission,
                ]);
                $bl_his_gen4th = new balance_history;
                $bl_his_gen4th -> userID = $userData_gen4th['id'];
                $bl_his_gen4th -> msg = '<p class="win">আপনি <span class="amount">'.$gen4th_commission.'</span> টাকা পেয়েছেন। আপনার ৪র্থ জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
                $bl_his_gen4th -> save();
            }

            // gen5th_commission
            if(!empty($userData['gen5th'])){
                $userData_gen5th =  user_account::where('invite', $userData['gen5th']) -> first();
                $gen5th_commission = ($my_commission/100)*$adminData['taskGen5th'];

                user_account::where('invite', $userData['gen5th']) -> update([
                    'totalAmount' => $userData_gen5th['totalAmount'] + $gen5th_commission,
                    'todaysAmount' => $userData_gen5th['todaysAmount'] + $gen5th_commission,
                    'todayRaferIncome' => $userData_gen5th['todayRaferIncome'] + $gen5th_commission,
                    'totalTeamRevenue' => $userData_gen5th['totalTeamRevenue'] + $gen5th_commission,
                ]);
                $bl_his_gen5th = new balance_history;
                $bl_his_gen5th -> userID = $userData_gen5th['id'];
                $bl_his_gen5th -> msg = '<p class="win">আপনি <span class="amount">'.$gen5th_commission.'</span> টাকা পেয়েছেন। আপনার ৫ম জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
                $bl_his_gen5th -> save();
            }

            // response
            return response()->json(['st' => true]);
        }else{
            return response()->json(['st' => false, 'msg' => 'No more works today!']);
        }
    }

    // task_get_users_data
    public function task_get_users_data(Request $req)
    {
        $data = user_account::where('csrf', $req -> session() -> get('csrf')) -> first();
        return response() -> json(['data' => $data]);
    }
}
