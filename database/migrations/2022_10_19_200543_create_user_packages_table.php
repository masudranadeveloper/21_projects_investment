<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('02_user_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name') -> default('VIP0');
            $table->string('minAmount') -> default('00');
            $table->string('maxAmount') -> default('100');
            $table->string('task') -> default('5');
            $table->string('commission') -> default('0.2');
            $table->string('img') -> default('package.png');
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
        Schema::dropIfExists('user_packages');
    }
}
