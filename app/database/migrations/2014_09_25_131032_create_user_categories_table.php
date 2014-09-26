<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_category', function(Blueprint $table){
            $table->bigIncrements('id')->unsigned();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');

            $table->unique(['user_id', 'category_id']);
        });

        Schema::table('user_category', function(Blueprint $t){
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $t->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_category', function($t){
            $t->dropForeign('user_category_user_id_foreign');
            $t->dropForeign('user_category_category_id_foreign');
        });
	}

}
