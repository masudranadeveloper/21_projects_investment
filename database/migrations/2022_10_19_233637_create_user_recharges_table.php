<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRechargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('03_user_recharges', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('amount');
            $table->string('userID');
            $table->string('orderID');
            $table->string('method');
            $table->string('tranx');
            $table->string('st');
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
        Schema::dropIfExists('user_recharges');
    }
}
