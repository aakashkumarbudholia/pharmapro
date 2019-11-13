<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubClientLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_client_login', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('client_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('user_name');
            $table->string('password');
            $table->string('company_name');
            $table->string('phone');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_client_login');
    }
}
