<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('tags',function($t) {
            $t->bigIncrements('id');
            $t->string('name')->nulllable();
            $t->string('slug')->index();
        });

        Schema::create('taggables',function($table){

            $table->integer('taggable_id');
            $table->integer('tag_id');
            $table->string('taggable_type');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tags');
        Schema::drop('taggables');

	}

}
