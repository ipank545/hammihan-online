<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHighlightedFieldToArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('articles', function(Blueprint $t){
            $t->boolean('highlighted')->default(0)->after('user_id');
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
            $t->dropColumn('highlighted');
        });
	}

}
