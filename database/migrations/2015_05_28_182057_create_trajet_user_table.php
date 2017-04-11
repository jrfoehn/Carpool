<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrajetUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trajet_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('trajet_id')->unsigned();
			$table->integer('nbplaces')->unsigned();
			
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');

			$table->foreign('trajet_id')->references('id')->on('T_TRAJET')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trajet_user', function(Blueprint $table) {
			$table->dropForeign('trajet_user_user_id_foreign');
			$table->dropForeign('trajet_user_trajet_id_foreign');
		});

		Schema::drop('trajet_user');
	}

}
