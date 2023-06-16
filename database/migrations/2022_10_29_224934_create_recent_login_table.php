<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecentLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('05_recent_login', function (Blueprint $table) {
            $table->id();
            $table->string("ip");
            $table->string("city");
            $table->string("region");
            $table->string("country");
            $table->string("postal");
            $table->string("userID");
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
        Schema::dropIfExists('recent_login');
    }
}
