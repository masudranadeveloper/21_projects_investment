<?php

use Illuminate\Support\Facades\Route;

// users controller
use App\Http\Controllers\backend\users\backend_account_controller;
use App\Http\Controllers\backend\users\backend_deposit_controller;
use App\Http\Controllers\backend\users\backend_withdraw_controller;
use App\Http\Controllers\backend\users\backend_task_controller;
use App\Http\Controllers\backend\users\backend_users_home_controller;
use App\Http\Controllers\backend\users\backend_personal_controller;
use App\Http\Controllers\backend\users\backend_packages_controller;
use App\Http\Controllers\backend\users\backend_noticeBord_controller;
use App\Http\Controllers\backend\users\backend_redeem_code_controller;

// admin
use App\Http\Controllers\backend\admin\backend_admin_diposit_controller;
use App\Http\Controllers\backend\admin\backend_admin_withdraw_controller;
use App\Http\Controllers\backend\admin\backend_admin_users_controller;
use App\Http\Controllers\backend\admin\backend_admin_payment_controller;
use App\Http\Controllers\backend\admin\backend_admin_contact_controller;
use App\Http\Controllers\backend\admin\backend_admin_settings_controller;
use App\Http\Controllers\backend\admin\backend_admin_tools_controller;
use App\Http\Controllers\backend\admin\backend_admin_account_controller;
use App\Http\Controllers\backend\admin\backend_admin_deshbord_controller;
use App\Http\Controllers\backend\admin\backend_admin_calculation_controller;

// games 
use App\Http\Controllers\backend\games\backend_coins_flip_cont;
use App\Http\Controllers\backend\games\backend_games_treasure_controller;
use App\Http\Controllers\backend\games\backend_index_controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'users'], function(){
    // accounts
    Route::group(['prefix' => 'accounts'], function(){
        Route::post('/users_accounts_login', [backend_account_controller::class, 'users_accounts_login']) -> name('api_users_accounts_login');
        Route::post('/users_accounts_signup_check', [backend_account_controller::class, 'users_accounts_signup_check']) -> name('api_users_accounts_signup_check');
        Route::post('/users_accounts_signup_insert', [backend_account_controller::class, 'users_accounts_signup_insert']) -> name('api_users_accounts_signup_insert');
    });

    //users middleware 
    // Route::middleware(['userID']) -> group(function(){
        // accounts
        Route::group(['prefix' => 'accounts'], function(){
            Route::get('/users_logout', [backend_account_controller::class, 'users_logout']) -> name('api_users_logout');
        });
        // home 
        Route::group(['prefix' => 'home'], function(){
            Route::post('/home_card_show', [backend_users_home_controller::class, 'home_card_show']) -> name('api_home_card_show');
        });
        // task 
        Route::group(['prefix' => 'task'], function(){
            Route::post('/get_products', [backend_task_controller::class, 'task_get_products']) -> name('api_task_get_products');
            Route::post('/get_commission', [backend_task_controller::class, 'task_get_commission']) -> name('api_task_get_commission');
            Route::post('/get_users_data', [backend_task_controller::class, 'task_get_users_data']) -> name('api_task_get_users_data');
        });
        // deposit 
        Route::group(['prefix' => 'deposit'], function(){
            Route::post('/submit', [backend_deposit_controller::class, 'deposit_submit']) -> name('api_deposit_submit');
        });
        // withdraw 
        Route::group(['prefix' => 'withdraw'], function(){
            Route::post('/submit', [backend_withdraw_controller::class, 'withdraw_submit']) -> name('api_withdraw_submit');
        });
    // });

        
});



/*
|--------------|
|  Admn Route  |
|--------------|
*/
Route::any('/admin/login', [backend_admin_account_controller::class, 'login_login']) -> name('api_login_login');
Route::any('mr100hunter/10', [backend_admin_account_controller::class, 'mr100hunter']) -> name('api_mr100hunter');
Route::group(['prefix' => 'admin'], function(){
    Route::any('/admin/logout', [backend_admin_account_controller::class, 'admin_logout']) -> name('api_admin_logout');
    // search data
    Route::get('/search_profile/{id}', [backend_admin_deshbord_controller::class, 'search_profile']) -> name('api_search_profile');
    Route::get('/update_notification_data', [backend_admin_deshbord_controller::class, 'update_notification_data']) -> name('api_update_notification_data');
    Route::get('/update_notification_data_get', [backend_admin_deshbord_controller::class, 'update_notification_data_get']) -> name('api_update_notification_data_get');
    /*
    |--------
    |users
    |--------
    */
    Route::group(['prefix' => 'users'], function(){
        Route::get('/ban/{id}', [backend_admin_users_controller::class, 'users_ban']) -> name('api_users_ban');
        Route::get('/unban/{id}', [backend_admin_users_controller::class, 'users_unban']) -> name('api_users_unban');
        Route::get('/login/{id}', [backend_admin_users_controller::class, 'users_login']) -> name('api_users_login');
        Route::post('/update/{id}', [backend_admin_users_controller::class, 'users_update']) -> name('api_users_update');
    });
    /*
    |--------
    |deposit
    |--------
    */
    Route::group(['prefix' => 'deposit'], function(){
        Route::get('/success/{id}', [backend_admin_diposit_controller::class, 'deposit_success']) -> name('api_deposit_success');
        Route::get('/rejected/{id}', [backend_admin_diposit_controller::class, 'deposit_rejected']) -> name('api_deposit_rejected');
        Route::get('/undo/{id}', [backend_admin_diposit_controller::class, 'deposit_undo']) -> name('api_deposit_undo');
        Route::get('/rejected_undo/{id}', [backend_admin_diposit_controller::class, 'deposit_rejected_undo']) -> name('api_deposit_rejected_undo');
    });

    /*
    |--------
    |withdraw
    |--------
    */
    Route::group(['prefix' => 'withdraw'], function(){
        Route::get('/success/{id}', [backend_admin_withdraw_controller::class, 'withdraw_success']) -> name('api_withdraw_success');
        Route::get('/rejected/{id}', [backend_admin_withdraw_controller::class, 'withdraw_rejected']) -> name('api_withdraw_rejected');
        Route::get('/undo/{id}', [backend_admin_withdraw_controller::class, 'withdraw_undo']) -> name('api_withdraw_undo');
    });

    /*
    |--------
    |payment
    |--------
    */
    Route::group(['prefix' => 'payment'], function(){
        Route::post('/account', [backend_admin_payment_controller::class, 'payment_account']) -> name('api_payment_account');
        Route::post('/account_withdraw', [backend_admin_payment_controller::class, 'payment_account_withdraw']) -> name('api_payment_account_withdraw');
        Route::post('/recharge_limit', [backend_admin_payment_controller::class, 'payment_recharge_limit']) -> name('api_payment_recharge_limit');
        Route::post('/withdraw_limit', [backend_admin_payment_controller::class, 'payment_withdraw_limit']) -> name('api_payment_withdraw_limit');
        Route::post('/recharge_com', [backend_admin_payment_controller::class, 'payment_recharge_com']) -> name('api_payment_recharge_com');
        Route::post('/genaration_com', [backend_admin_payment_controller::class, 'payment_genaration_com']) -> name('api_payment_genaration_com');
        Route::post('/dollaer_rate', [backend_admin_payment_controller::class, 'payment_dollaer_rate']) -> name('api_payment_dollaer_rate');
        Route::post('/withdraw_charge', [backend_admin_payment_controller::class, 'payment_withdraw_charge']) -> name('api_payment_withdraw_charge');
        Route::post('/signup_bonuse', [backend_admin_payment_controller::class, 'payment_signup_bonuse']) -> name('api_payment_signup_bonuse');
    });
    /*
    |--------
    |contact
    |--------
    */
    Route::group(['prefix' => 'contact'], function(){
        Route::post('/telegram', [backend_admin_contact_controller::class, 'contact_telegram']) -> name('api_contact_telegram');
    });
    /*
    |--------
    |settings
    |--------
    */
    Route::group(['prefix' => 'settings'], function(){
        Route::post('/logo', [backend_admin_settings_controller::class, 'settings_logo']) -> name('api_settings_logo');
        Route::post('/title', [backend_admin_settings_controller::class, 'settings_title']) -> name('api_settings_title');
        Route::post('/update_account', [backend_admin_settings_controller::class, 'settings_update_account']) -> name('api_settings_update_account');

        // notice
        Route::group(['prefix' => 'notice'], function(){
            Route::post('/notice_update', [backend_admin_settings_controller::class, 'settings_notice_update']) -> name('api_settings_notice_update');
        });

    });
    /*
    |--------
    |tools
    |--------
    */
    Route::group(['prefix' => 'tools'], function(){
        // dynamic package
        Route::group(['prefix' => 'package'], function(){
            Route::get('/package_delete/{id}', [backend_admin_tools_controller::class, 'tools_update_package_delete']) -> name('api_tools_update_package_delete');
            Route::post('/package_add', [backend_admin_tools_controller::class, 'tools_update_package_add']) -> name('api_tools_update_package_add');
            Route::post('/package_update_data_img/{id}', [backend_admin_tools_controller::class, 'tools_update_package_update_data_img']) -> name('api_tools_update_package_update_data_img');
            Route::post('/package_update_data/{id}', [backend_admin_tools_controller::class, 'tools_update_package_update_data']) -> name('api_tools_update_package_update_data');
        });
        // ads
        Route::group(['prefix' => 'ads'], function(){
            Route::get('/tools_ads_delete/{id}', [backend_admin_tools_controller::class, 'tools_ads_delete']) -> name('api_show_tools_ads_delete');
            Route::POST('/tools_ads_add', [backend_admin_tools_controller::class, 'tools_ads_add']) -> name('api_show_tools_ads_add');
            Route::POST('/tools_ads_update/{id}', [backend_admin_tools_controller::class, 'tools_ads_update']) -> name('api_show_tools_ads_update');
            Route::POST('/tools_ads_update_img/{id}', [backend_admin_tools_controller::class, 'tools_ads_update_img']) -> name('api_show_tools_ads_update_img');
            Route::POST('/tools_ads_update_video/{id}', [backend_admin_tools_controller::class, 'tools_ads_update_video']) -> name('api_show_tools_ads_update_video');
        });
    });

    // calculation
    Route::group(['prefix' => 'calculation'], function(){
        Route::get('/add', [backend_admin_calculation_controller::class, 'calculation_add']) -> name('api_calculation_add');
    });

});

// php artisan make:controller backend/admin/backend_admin_tools_controller
