<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_recharge;
use Illuminate\Support\Facades\DB;

class frontend_admin_recharge_controller extends Controller
{
    // recharge_new
    public function recharge_new(Request $req)
    {
        $user_account = user_recharge::orderBy('id', 'DESC')-> where('st', 'pending') -> paginate(10);
        $compact = compact('user_account');
        return view('admin.pages.recharge.new') -> with($compact);
    }

    // recharge_success
    public function recharge_success(Request $req)
    {
        $user_account = user_recharge::orderBy('id', 'DESC')-> where('st', 'success') -> paginate(10);
        $compact = compact('user_account');
        return view('admin.pages.recharge.success') -> with($compact);
    }
    // recharge_record
    public function recharge_record(Request $req)
    {
        $startDate = Date('Y-m').'-01';
        $endDate = Date('Y-m-d');

        $monthlyData = user_recharge::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"), DB::raw("SUM(amount) as total_amount, COUNT(*) as row"))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('date', 'desc')
            ->where('st', 'success')
            ->paginate(10);
        $compact = compact('monthlyData');
        return view('admin.pages.withdraw.Monthly_record') -> with($compact);
    }
}
