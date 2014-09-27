<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumbImageAndLargeImageToArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('articles',function(Blueprint $t){
            $t->text('thumb_image')->nullable()->after('important_title');
            $t->text('large_image')->nullable()->after('important_title');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('articles', function($t){
            $t->dropColumn('thumb_image');
            $t->dropColumn('large_image');
        });
	}

}
