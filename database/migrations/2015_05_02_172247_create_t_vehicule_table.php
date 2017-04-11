<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTVehiculeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_vehicule', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('couleurVehicule', 15);
			$table->string('marqueVehicule', 15);
			$table->string('nomVehicule', 25);
			$table->date('dateMiseEnService');
			$table->integer('nbPlacesVehicule');
			$table->integer('user_id')->unsigned();
			
			$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');
				  
			$table->timestamps();
			$table->engine = 'InnoDB';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_vehicule');
	}

}
