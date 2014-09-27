<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentableToArticlesAndRemoveStateId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('articles', function(Blueprint $t){
            $t->boolean('commentable')->after('user_id')->default(1);
            $t->dropColumn('status_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('articles', function(Blueprint $t){
            $t->dropColumn('commentable');
            $t->unsignedInteger('status_id')->nullable();
        });
	}

}
