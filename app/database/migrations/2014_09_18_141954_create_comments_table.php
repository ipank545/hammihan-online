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
            $t->string('commentable_type');
            $t->integer('commentable_id')->unisigned();
            $t->integer('parent_id')->unsigned()->nullable();
            $t->integer('status_id')->unsigned()->nullable();
            $t->string('title')->nulllable();
            $t->text('message');
            $t->string('commenter_name');
            $t->string('commenter_email')->nullable();
            $t->string('commenter_website');
            $t->timestamps();
        });

        Schema::table('comments', function($table){
            // $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('comments', function(Blueprint $t){
            // $t->dropForeign('comments_parent_id_foreign');
        });
	}

}
