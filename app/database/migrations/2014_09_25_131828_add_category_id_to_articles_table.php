<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('articles', function(Blueprint $t){
            $t->unsignedInteger('category_id')->after('id')->nullable()->index();
        });

        Schema::table('articles', function(Blueprint $t){
            $t->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
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
            $t->dropColumn('category_id');
            $t->dropForeign('articles_category_id_foreign');
        });
	}

}
