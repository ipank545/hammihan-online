<?php

use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles',function($t){
            $t->bigIncrements('id');
            $t->integer('user_id')->unsigned();
            $t->string('author')->nullable();
            $t->string('important_title',600);
            $t->string('first_title',600)->nullable();
            $t->string('second_title',600)->nulllable();
            $t->string('url_slug',600)->index();
            $t->text('body')->nullable();
            $t->text('summary')->nullable();
            $t->timestamp('publish_date')->nullable();
            $t->integer('status_id');
            $t->timestamps();

            // $t->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
