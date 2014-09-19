<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images',function($t){
            $t->bigIncrements('id');
            $t->text('url');
            $t->string('imageable_type')->index();
            $t->integer('imageable_id')->index();
            $t->string('title')->nullable();
            $t->text('description')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('images');
	}

}
