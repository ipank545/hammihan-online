<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table){
            $table->increments('id');
            $table->string('user_name')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('voip_id');
            $table->string('remember_token')->nullable()->index();
            $table->string('persist_code')->nullable()->index();
            $table->timestamp('last_login');
            $table->timestamp('last_access');
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
		Schema::drop('users');
	}

}
