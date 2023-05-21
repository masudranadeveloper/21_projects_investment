<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('00_admin_accounts', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->default('logo.png');
            $table->text('title')->default('Best Income Site Ever');
            $table->text('admin_name')->default('Admin');
            $table->text('admin_username')->default('1');
            $table->text('admin_password')->default('1');
            $table->text('withdraw_charge')->default('10');
            $table->text('teligram_link')->nullable();
            // payment info deposit
            $table->text('bkash_number')->nullable();
            $table->text('nagad_number')->nullable();
            $table->text('rocket_number')->nullable();
            $table->text('usdt_address')->nullable();
            // payment info withdraw
            $table->text('withdraw_bkash_number')->nullable();
            $table->text('withdraw_nagad_number')->nullable();
            $table->text('withdraw_rocket_number')->nullable();
            $table->text('withdraw_usdt_address')->nullable();
            // min &max withdraw & deposit
            $table->text('minWithdraw')->default('5');
            $table->text('maxWithdraw')->default('10000');
            $table->text('minDeposit')->default('5');
            $table->text('maxDeposit')->default('10000');
            $table->text('nextWIthdraw')->default('00');
            $table->text('withdrawWithOutDeposi')->default('no');
            $table->text('offer_balance') -> default('2');
            // recharge commission
            $table->text('depositGen1st')->default('5');
            $table->text('depositGen2nd')->default('4');
            $table->text('depositGen3rd')->default('3');
            $table->text('depositGen4th')->default('2');
            $table->text('depositGen5th')->default('1');
            // task gen
            $table->text('taskGen1st')->default('10');
            $table->text('taskGen2nd')->default('5');
            $table->text('taskGen3rd')->default('3');
            $table->text('taskGen4th')->default('2');
            $table->text('taskGen5th')->default('1');
            // notification
            $table->text('home_notification')->default('00');
            $table->text('withdraw_info')->default('withdraw_info');
            $table->text('deposit_info')->default('deposit_info');
            $table->text('task_info')->default('task_info');
            // calculation 
            $table->text('available_amount')->default('00');
            $table->text('site_promotion')->default('00');
            $table->text('we_recived')->default('00');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_accounts');
    }
}
