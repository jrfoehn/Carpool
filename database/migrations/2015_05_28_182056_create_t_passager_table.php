<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPassagerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_passager', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('trajet_id')->unsigned();
			
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');

			$table->foreign('trajet_id')->references('id')->on('T_TRAJET')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_passager', function(Blueprint $table) {
			$table->dropForeign('t_passager_user_id_foreign');
			$table->dropForeign('t_passager_trajet_id_foreign');
		});

		Schema::drop('t_passager');
	}

}
