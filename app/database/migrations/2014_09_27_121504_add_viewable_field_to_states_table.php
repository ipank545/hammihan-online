<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddViewableFieldToStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('states', function(Blueprint $t){
            $t->boolean('viewable')->default(0)->after('display_name');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('states', function(Blueprint $t){
            $t->dropColumn('viewable');
        });
	}

}
