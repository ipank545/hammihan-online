<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_states', function(Blueprint $t){
            $t->increments('id');
            $t->unsignedInteger('role_id');
            $t->unsignedInteger('state_id');
            $t->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $t->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_states', function($t){
            $t->dropForeign('role_states_role_id_foreign');
            $t->dropForeign('role_states_state_id_foreign');
        });
	}

}
