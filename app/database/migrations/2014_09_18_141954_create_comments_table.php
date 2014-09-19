<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('comments',function($t) {
            $t->bigIncrements('id');
            $t->string('title')->nulllable();
            $t->string('commenter_name');
            $t->string('commenter_email');
            $t->text('message');
            $t->string('website');
            $t->integer('status');
            $t->integer('parent_id')->unsigned()->nullable();
            $t->timestamps();
     });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('comments');
	}

}
