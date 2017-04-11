<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAppreciationTrajetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_appreciation_trajet', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('trajet_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('valeurAppreciation');
			
			$table->foreign('trajet_id')
				  ->references('id')
				  ->on('t_trajet')
				  ->onDelete('cascade')
				  ->onUpdate('cascade');
				  
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
		Schema::drop('t_appreciation_trajet');
	}

}
