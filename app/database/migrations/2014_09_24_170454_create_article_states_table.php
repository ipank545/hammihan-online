<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_states', function(Blueprint $t){

            $t->bigIncrements('id')->unsigned();

            $t->unsignedBigInteger('article_id');
            $t->unsignedInteger('user_id');

            $t->boolean('last')->default(1);

            $t->timestamps();

            $t->unique(['article_id', 'last']);
        });

        Schema::table('article_states',function(Blueprint $t){
            $t->foreign('article_id')->references('id')->on('articles');
            $t->foreign('user_id')->references('id')->on('users');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_states', function(Blueprint $t){
            $t->dropForeign('article_states_user_id_foreign');
            $t->dropForeign('article_states_article_id_foreign');
        });
	}

}
