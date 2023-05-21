<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_recharge;
use App\Models\user_account;
use App\Models\admin_account;
use App\Models\balance_history;
use App\Models\user_package;

class backend_admin_diposit_controller extends Controller
{
    // deposit_success
    public function deposit_success($id)
    {
        $rechargeData = user_recharge::findOrfail($id);
        $userData = user_account::findOrfail($rechargeData['userID']);
        $adminData = admin_account::where('id', 1)->first();

        // update amount
        $r_amount = $rechargeData['amount'];

        admin_account::where('id', 1)->update([
            "available_amount" => $adminData['available_amount'] + $r_amount,
        ]);
        
        // rechargeData update
        user_recharge::where('id', $id) -> update([
            "st" => "success"
        ]);

        user_account::where('id', $rechargeData['userID']) -> update([
            'totalAmount' => $userData['totalAmount'] + $r_amount,
            'todaysAmount' => $userData['todaysAmount'] + $r_amount,
            'totalDeposit' => $userData['totalDeposit'] + $r_amount,
        ]);

        $bl_his_my = new balance_history;
        $bl_his_my -> userID = $userData['id'];
        $bl_his_my -> msg = '<p class="win">আপনি <span class="amount">'.$r_amount.'</span> টাকা ডিপজিট করেছেন। <span><i class="fa-solid fa-face-smile"></i></span></p>';
        $bl_his_my -> type = 'deposit';
        $bl_his_my -> save();

        // admin avilable 
        $admin_available = new balance_history;
        $admin_available->userID = '0';
        $admin_available->msg = 'Deposit user => '.$rechargeData['userID'].' || Type => Deposit || Available Amount => '.$adminData['available_amount'].'+'.$r_amount.'='.($adminData['available_amount'] + $r_amount);
        $admin_available->type = 'calculation';
        $admin_available->save(); 
        /*
        ================
        Task
        ================
        */
        $package_data = user_package::orderBy('minAmount', 'ASC') -> where('minAmount', '<=', intval($userData['totalAmount'])) -> where('maxAmount', '>=', intval($userData['totalAmount'])) -> first();
        
        if(/*($userData['task'] > 0) && */($package_data['package_name'] != $userData['vipBase'])){
            user_account::where('id', $rechargeData['userID']) -> update([
                'task' => $package_data['task'],
            ]);
        }

        /*
        ================
        Commission
        ================
        */
        // gen1st_commission
        if(!empty($userData['gen1st'])){
            $userData_gen1st =  user_account::where('invite', $userData['gen1st']) -> first();
            $gen1st_commission = ($r_amount/100)*$adminData['depositGen1st'];

            user_account::where('invite', $userData['gen1st']) -> update([
                'totalAmount' => $userData_gen1st['totalAmount'] + $gen1st_commission,
                'todaysAmount' => $userData_gen1st['todaysAmount'] + $gen1st_commission,
                'todaysRechargeIncome' => $userData_gen1st['todaysRechargeIncome'] + $gen1st_commission,
                'totalTeamRevenue' => $userData_gen1st['totalTeamRevenue'] + $gen1st_commission,
            ]);
            $bl_his_gen_1st = new balance_history;
            $bl_his_gen_1st -> userID = $userData_gen1st['id'];
            $bl_his_gen_1st -> msg = '<p class="win">আপনি <span class="amount">'.$gen1st_commission.'</span> টাকা রিচার্জ কমিশন পেয়েছেন পেয়েছেন। আপনার ১ম জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
            $bl_his_gen_1st -> save();
        }

        // gen2nd_commission
        if(!empty($userData['gen2nd'])){
            $userData_gen2nd =  user_account::where('invite', $userData['gen2nd']) -> first();
            $gen2nd_commission = ($r_amount/100)*$adminData['depositGen2nd'];

            user_account::where('invite', $userData['gen2nd']) -> update([
                'totalAmount' => $userData_gen2nd['totalAmount'] + $gen2nd_commission,
                'todaysAmount' => $userData_gen2nd['todaysAmount'] + $gen2nd_commission,
                'todaysRechargeIncome' => $userData_gen2nd['todaysRechargeIncome'] + $gen2nd_commission,
                'totalTeamRevenue' => $userData_gen2nd['totalTeamRevenue'] + $gen2nd_commission,
            ]);
            $bl_his_gen_2nd = new balance_history;
            $bl_his_gen_2nd -> userID = $userData_gen2nd['id'];
            $bl_his_gen_2nd -> msg = '<p class="win">আপনি <span class="amount">'.$gen2nd_commission.'</span> টাকা রিচার্জ কমিশন পেয়েছেন পেয়েছেন। আপনার ২য় জেনারেশনেরের সদস্য থেকে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
            $bl_his_gen_2nd -> save();
        }

        // gen3rd_commission
        if(!empty($userData['gen3rd'])){
            $userData_gen3rd =  user_account::where('invite', $userData['gen3rd']) -> first();
            $gen3rd_commission = ($r_amount/100)*$adminData['depositGen3rd'];

            user_account::where('invite', $userData['gen3rd']) -> update([
                'totalAmount' => $userData_gen3rd['totalAmount'] + $gen3rd_commission,
                'todaysAmount' => $userData_gen3rd['todaysAmount'] + $gen3rd_commission,
                'todaysRechargeIncome' => $userData_gen3rd['todaysRechargeIncome'] + $gen3rd_commission,
                'totalTeamRevenue' => $userData_gen3rd['totalTeamRevenue'] + $gen3rd_commission,
            ]);
            $bl_his_gen_3rd = new balance_history;
            $bl_his_gen_3rd -> userID = $userData_gen3rd['id'];
            $bl_his_gen_3rd -> msg = '<p class="win">আপনি <span class="amount">'.$gen3rd_commission.'</span> টাকা রিচার্জ কমিশন পেয়েছেন পেয়েছেন। আপনার ৩য় জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
            $bl_his_gen_3rd -> save();
        }

        // gen4th_commission
        if(!empty($userData['gen4th'])){
            $userData_gen4th =  user_account::where('invite', $userData['gen4th']) -> first();
            $gen4th_commission = ($r_amount/100)*$adminData['depositGen4th'];

            user_account::where('invite', $userData['gen4th']) -> update([
                'totalAmount' => $userData_gen4th['totalAmount'] + $gen4th_commission,
                'todaysAmount' => $userData_gen4th['todaysAmount'] + $gen4th_commission,
                'todaysRechargeIncome' => $userData_gen4th['todaysRechargeIncome'] + $gen4th_commission,
                'totalTeamRevenue' => $userData_gen4th['totalTeamRevenue'] + $gen4th_commission,
            ]);
            $bl_his_gen4th = new balance_history;
            $bl_his_gen4th -> userID = $userData_gen4th['id'];
            $bl_his_gen4th -> msg = '<p class="win">আপনি <span class="amount">'.$gen4th_commission.'</span> টাকা রিচার্জ কমিশন পেয়েছেন পেয়েছেন। আপনার ৪র্থ জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
            $bl_his_gen4th -> save();
        }

        // gen5th_commission
        if(!empty($userData['gen5th'])){
            $userData_gen5th =  user_account::where('invite', $userData['gen5th']) -> first();
            $gen5th_commission = ($r_amount/100)*$adminData['depositGen5th'];

            user_account::where('invite', $userData['gen5th']) -> update([
                'totalAmount' => $userData_gen5th['totalAmount'] + $gen5th_commission,
                'todaysAmount' => $userData_gen5th['todaysAmount'] + $gen5th_commission,
                'todaysRechargeIncome' => $userData_gen5th['todaysRechargeIncome'] + $gen5th_commission,
                'totalTeamRevenue' => $userData_gen5th['totalTeamRevenue'] + $gen5th_commission,
            ]);
            $bl_his_gen5th = new balance_history;
            $bl_his_gen5th -> userID = $userData_gen5th['id'];
            $bl_his_gen5th -> msg = '<p class="win">আপনি <span class="amount">'.$gen5th_commission.'</span> টাকা রিচার্জ কমিশন পেয়েছেন পেয়েছেন। আপনার ৫ম জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-smile"></i></span></p>';
            $bl_his_gen5th -> save();
        }

        return back() -> with('msg', 'Deposit Request successfully accepted!');
    }

    // deposit_undo
    public function deposit_undo($id)
    {
        $rechargeData = user_recharge::findOrfail($id);
        $userData = user_account::findOrfail($rechargeData['userID']);
        $adminData = admin_account::where('id', 1)->first();
        // update amount
        $r_amount = $rechargeData['amount'];

        admin_account::where('id', 1)->update([
            "available_amount" => $adminData['available_amount'] - $r_amount,
        ]);

        // rechargeData update
        user_recharge::where('id', $id) -> update([
            "st" => "pending"
        ]);

        // update amount
        user_account::where('id', $rechargeData['userID']) -> update([
            'totalAmount' => $userData['totalAmount'] - $r_amount,
            'todaysAmount' => $userData['todaysAmount'] - $r_amount,
            'totalDeposit' => $userData['totalDeposit'] - $r_amount,
        ]);

        $bl_his_my = new balance_history;
        $bl_his_my -> userID = $userData['id'];
        $bl_his_my -> msg = '<p class="win">আপনি <span class="amount">'.$r_amount.'</span> টাকা ডিপজিট ফিরিয়ে নিয়েছেন। <span><i class="fa-solid fa-face-frown"></i></span></p>';
        $bl_his_my -> type = 'deposit';
        $bl_his_my -> save();
        // admin avilable 
        $admin_available = new balance_history;
        $admin_available->userID =  $userData['id'];
        $admin_available->msg = 'Deposit undo user => '.$rechargeData['userID'].' || Type => Deposit || Available Amount => '.$adminData['available_amount'].'-'.$r_amount.'='.($adminData['available_amount'] - $r_amount);
        $admin_available->type = 'calculation';
        $admin_available->save();

        /*
        ================
        Commission
        ================
        */
        // gen1st_commission
        if(!empty($userData['gen1st'])){
            $userData_gen1st =  user_account::where('invite', $userData['gen1st']) -> first();
            $gen1st_commission = ($r_amount/100)*$adminData['depositGen1st'];

            user_account::where('invite', $userData['gen1st']) -> update([
                'totalAmount' => $userData_gen1st['totalAmount'] - $gen1st_commission,
                'todaysAmount' => $userData_gen1st['todaysAmount'] - $gen1st_commission,
                'todaysRechargeIncome' => $userData_gen1st['todaysRechargeIncome'] - $gen1st_commission,
                'totalTeamRevenue' => $userData_gen1st['totalTeamRevenue'] - $gen1st_commission,
            ]);
            $bl_his_gen_1st = new balance_history;
            $bl_his_gen_1st -> userID = $userData_gen1st['id'];
            $bl_his_gen_1st -> msg = '<p class="win">আপনার <span class="amount">'.$gen1st_commission.'</span> টাকা রিচার্জ কমিশন ফিরত নেয়া হয়েছে। আপনার ১ম জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-frown"></i></span></p>';
            $bl_his_gen_1st -> save();
        }

        // gen2nd_commission
        if(!empty($userData['gen2nd'])){
            $userData_gen2nd =  user_account::where('invite', $userData['gen2nd']) -> first();
            $gen2nd_commission = ($r_amount/100)*$adminData['depositGen2nd'];

            user_account::where('invite', $userData['gen2nd']) -> update([
                'totalAmount' => $userData_gen2nd['totalAmount'] - $gen2nd_commission,
                'todaysAmount' => $userData_gen2nd['todaysAmount'] - $gen2nd_commission,
                'todaysRechargeIncome' => $userData_gen2nd['todaysRechargeIncome'] - $gen2nd_commission,
                'totalTeamRevenue' => $userData_gen2nd['totalTeamRevenue'] - $gen2nd_commission,
            ]);
            $bl_his_gen_2nd = new balance_history;
            $bl_his_gen_2nd -> userID = $userData_gen2nd['id'];
            $bl_his_gen_2nd -> msg = '<p class="win">আপনার <span class="amount">'.$gen2nd_commission.'</span> টাকা রিচার্জ কমিশন ফিরত নেয়া হয়েছে। আপনার ২য় জেনারেশনেরের সদস্য থেকে। <span><i class="fa-solid fa-face-frown"></i></span></p>';
            $bl_his_gen_2nd -> save();
        }

        // gen3rd_commission
        if(!empty($userData['gen3rd'])){
            $userData_gen3rd =  user_account::where('invite', $userData['gen3rd']) -> first();
            $gen3rd_commission = ($r_amount/100)*$adminData['depositGen3rd'];

            user_account::where('invite', $userData['gen3rd']) -> update([
                'totalAmount' => $userData_gen3rd['totalAmount'] - $gen3rd_commission,
                'todaysAmount' => $userData_gen3rd['todaysAmount'] - $gen3rd_commission,
                'todaysRechargeIncome' => $userData_gen3rd['todaysRechargeIncome'] - $gen3rd_commission,
                'totalTeamRevenue' => $userData_gen3rd['totalTeamRevenue'] - $gen3rd_commission,
            ]);
            $bl_his_gen_3rd = new balance_history;
            $bl_his_gen_3rd -> userID = $userData_gen3rd['id'];
            $bl_his_gen_3rd -> msg = '<p class="win">আপনার <span class="amount">'.$gen3rd_commission.'</span> টাকা রিচার্জ কমিশন ফিরত নেয়া হয়েছে। আপনার ৩য় জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-frown"></i></span></p>';
            $bl_his_gen_3rd -> save();
        }

        // gen4th_commission
        if(!empty($userData['gen4th'])){
            $userData_gen4th =  user_account::where('invite', $userData['gen4th']) -> first();
            $gen4th_commission = ($r_amount/100)*$adminData['depositGen4th'];

            user_account::where('invite', $userData['gen4th']) -> update([
                'totalAmount' => $userData_gen4th['totalAmount'] - $gen4th_commission,
                'todaysAmount' => $userData_gen4th['todaysAmount'] - $gen4th_commission,
                'todaysRechargeIncome' => $userData_gen4th['todaysRechargeIncome'] - $gen4th_commission,
                'totalTeamRevenue' => $userData_gen4th['totalTeamRevenue'] - $gen4th_commission,
            ]);
            $bl_his_gen4th = new balance_history;
            $bl_his_gen4th -> userID = $userData_gen4th['id'];
            $bl_his_gen4th -> msg = '<p class="win">আপনার <span class="amount">'.$gen4th_commission.'</span> টাকা রিচার্জ কমিশন ফিরত নেয়া হয়েছে। আপনার ৪র্থ জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-frown"></i></span></p>';
            $bl_his_gen4th -> save();
        }

        // gen5th_commission
        if(!empty($userData['gen5th'])){
            $userData_gen5th =  user_account::where('invite', $userData['gen5th']) -> first();
            $gen5th_commission = ($r_amount/100)*$adminData['depositGen5th'];

            user_account::where('invite', $userData['gen5th']) -> update([
                'totalAmount' => $userData_gen5th['totalAmount'] - $gen5th_commission,
                'todaysAmount' => $userData_gen5th['todaysAmount'] - $gen5th_commission,
                'todaysRechargeIncome' => $userData_gen5th['todaysRechargeIncome'] - $gen5th_commission,
                'totalTeamRevenue' => $userData_gen5th['totalTeamRevenue'] - $gen5th_commission,
            ]);
            $bl_his_gen5th = new balance_history;
            $bl_his_gen5th -> userID = $userData_gen5th['id'];
            $bl_his_gen5th -> msg = '<p class="win">আপনার <span class="amount">'.$gen5th_commission.'</span> টাকা রিচার্জ কমিশন ফিরত নেয়া হয়েছে। আপনার ৫ম জেনারেশনের সদস্য থেকে। <span><i class="fa-solid fa-face-frown"></i></span></p>';
            $bl_his_gen5th -> save();
        }

        return back() -> with('msg', 'Deposit Request successfully undo!');
    }

    // deposit_rejected
    public function deposit_rejected($id)
    {
        user_recharge::where('id', $id) -> update([
            "st" => "rejected"
        ]);
        return back() -> with('msg', 'Deposit Request successfully deleted!');
    }

    // deposit_rejected_undo
    public function deposit_rejected_undo($id)
    {
        user_recharge::where('id', $id) -> update([
            "st" => "pending"
        ]);
        return back() -> with('msg', 'Deposit Request successfully deleted!');
    }

}
