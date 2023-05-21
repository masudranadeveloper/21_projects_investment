<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// new  
use App\Http\Controllers\frontend\users\frontend_account_controller;
use App\Http\Controllers\frontend\users\frontend_home_controller;
use App\Http\Controllers\frontend\users\frontend_history_controller;
use App\Http\Controllers\frontend\users\frontend_task_controller;
use App\Http\Controllers\frontend\users\frontend_chat_controller;
use App\Http\Controllers\frontend\users\frontend_personal_controller;

// admin
use App\Http\Controllers\frontend\admin\frontend_admin_deshbord_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_users_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_recharge_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_withdraw_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_payment_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_contact_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_tools_controller;
use App\Http\Controllers\frontend\admin\frontend_admin_settings_controller;
use App\Http\Controllers\frontend\admin\admin_calculation_controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/change_language', function(Request $request){
    if($request -> session() -> has('len')){
        if($request -> session() -> get('len') == "bn"){
            $request -> session() -> put('len', 'en');
        }else{
            $request -> session() -> put('len', 'bn');
        }
    }else{
        $request -> session() -> put('len', 'bn');
    }
    
    return back();
}) -> name('change_language');


Route::middleware(['len']) -> group(function(){
    // index 
    Route::get('/', [frontend_home_controller::class, 'index_show']) -> name('web_index_show');

    // account
    Route::group(['prefix' => 'account'], function(){
        Route::get('/login', [frontend_account_controller::class, 'account_show_login']) -> name('web_account_show_login');
        Route::get('/signup', [frontend_account_controller::class, 'account_show_signup']) -> name('web_account_show_signup');
    });
    // company
    Route::group(['prefix' => 'company'], function(){
        Route::get('/', [frontend_home_controller::class, 'company_show']) -> name('web_company_show');
    });
    // support
    Route::group(['prefix' => 'support'], function(){
        Route::get('/', [frontend_chat_controller::class, 'support_show']) -> name('web_support_show');
    });
    // info 
    Route::get('/info', [frontend_home_controller::class, 'info_show']) -> name('web_info_show');

    // user middlw ware
    Route::middleware(['userID']) -> group(function(){
        // home
        Route::get('/home', [frontend_home_controller::class, 'home_show']) -> name('web_home_show');
        // invite 
        Route::get('/invite', [frontend_home_controller::class, 'invite_show']) -> name('web_invite_show');
        // task
        Route::group(['prefix' => 'task'], function(){
            Route::get('/', [frontend_task_controller::class, 'task_show']) -> name('web_task_show');
        });
        // personal
        Route::group(['prefix' => 'personal'], function(){
            Route::get('/', [frontend_personal_controller::class, 'personal_show']) -> name('web_personal_show');
            // team
            Route::group(['prefix' => 'team'], function(){
                Route::get('/report', [frontend_personal_controller::class, 'personal_team_report']) -> name('web_personal_team_report');
                Route::get('/member/{id}', [frontend_personal_controller::class, 'personal_team_member']) -> name('web_personal_team_member');
            });
            Route::get('/info', [frontend_personal_controller::class, 'personal_info']) -> name('web_personal_info');
            Route::get('/gift', [frontend_personal_controller::class, 'personal_gift']) -> name('web_personal_gift');
        });

        // deposit
        Route::group(['prefix' => 'deposit'], function(){
            Route::get('/', [frontend_home_controller::class, 'deposit_show']) -> name('web_deposit_show');
        });
        
        // withdraw
        Route::group(['prefix' => 'withdraw'], function(){
            Route::get('/', [frontend_home_controller::class, 'withdraw_show']) -> name('web_withdraw_show');
        });

        // history
        Route::group(['prefix' => 'history'], function(){
            Route::group(['task' => 'account'], function(){
                Route::get('/today', [frontend_history_controller::class, 'history_task_today_show']) -> name('web_history_task_today_show');
                Route::get('/all', [frontend_history_controller::class, 'history_task_all_show']) -> name('web_history_task_all_show');
            });
            // account
            Route::group(['prefix' => 'account'], function(){
                Route::get('/deposit', [frontend_history_controller::class, 'history_account_deposit']) -> name('web_history_account_deposit');
                Route::get('/withdraw', [frontend_history_controller::class, 'history_account_withdraw']) -> name('web_history_account_withdraw');
            });
        });

        // logout
        Route::group(['prefix' => 'logout'], function(){
            Route::get('/', [frontend_account_controller::class, 'users_logout']) -> name('web_users_logout');
        });

    });
});



// ==================
// admin
// ==================
Route::any('/admin/login', [frontend_admin_deshbord_controller::class, 'login_login']) -> name('login_login');

Route::middleware(['adminID']) -> group(function(){
    Route::group(['prefix' => 'admin'], function(){
        Route::get('/', [frontend_admin_deshbord_controller::class, 'admin_show']) -> name('admin_show');
        // users
        Route::group(['prefix' => 'users'], function(){
            Route::get('/all', [frontend_admin_users_controller::class, 'users_all']) -> name('show_users_all');
            Route::get('/active', [frontend_admin_users_controller::class, 'users_active']) -> name('show_users_active');
            Route::get('/ban', [frontend_admin_users_controller::class, 'users_ban']) -> name('show_users_ban');
            Route::get('/profile/{id}', [frontend_admin_users_controller::class, 'users_profile']) -> name('show_users_profile');
        });

        // recharge
        Route::group(['prefix' => 'recharge'], function(){
            Route::get('/new', [frontend_admin_recharge_controller::class, 'recharge_new']) -> name('show_recharge_new');
            Route::get('/success', [frontend_admin_recharge_controller::class, 'recharge_success']) -> name('show_recharge_success');
            Route::get('/record', [frontend_admin_recharge_controller::class, 'recharge_record']) -> name('show_recharge_record');
        });

        // withdraw
        Route::group(['prefix' => 'withdraw'], function(){
            Route::get('/new', [frontend_admin_withdraw_controller::class, 'withdraw_new']) -> name('show_withdraw_new');
            Route::get('/success', [frontend_admin_withdraw_controller::class, 'withdraw_success']) -> name('show_withdraw_success');
            Route::get('/record', [frontend_admin_withdraw_controller::class, 'withdraw_record']) -> name('show_withdraw_record');
        });

        // payment
        Route::group(['prefix' => 'payment'], function(){
            Route::get('/', [frontend_admin_payment_controller::class, 'payment']) -> name('show_payment');
        });
        // contact
        Route::group(['prefix' => 'contact'], function(){
            Route::get('/', [frontend_admin_contact_controller::class, 'contact']) -> name('show_contact');
        });
        // tools
        Route::group(['prefix' => 'tools'], function(){
            Route::get('/dynamic_package', [frontend_admin_tools_controller::class, 'dynamic_package']) -> name('show_dynamic_package');
            Route::get('/dynamic_package_add', [frontend_admin_tools_controller::class, 'dynamic_package_add']) -> name('show_dynamic_package_add');
            Route::get('/dynamic_package_update/{id}', [frontend_admin_tools_controller::class, 'dynamic_package_update']) -> name('show_dynamic_package_update');
            // ads
            Route::group(['prefix' => 'ads'], function(){
                Route::get('/tools_ads_show', [frontend_admin_tools_controller::class, 'tools_ads_show']) -> name('show_tools_ads_show');
                Route::get('/tools_ads_add', [frontend_admin_tools_controller::class, 'tools_ads_add']) -> name('show_tools_ads_add');
                Route::get('/tools_ads_update/{id}', [frontend_admin_tools_controller::class, 'tools_ads_update']) -> name('show_tools_ads_update');
            });
        });
        // settings
        Route::group(['prefix' => 'settings'], function(){
            Route::get('/', [frontend_admin_settings_controller::class, 'settings']) -> name('show_settings');
        });

        // calculation
        Route::group(['prefix' => 'calculation'], function(){
            Route::get('/', [admin_calculation_controller::class, 'calculation']) -> name('show_calculation');
            Route::get('/history', [admin_calculation_controller::class, 'calculation_history']) -> name('show_calculation_history');
        });

    });
});

// php artisan make:controller frontend/users/frontend_account_controller
