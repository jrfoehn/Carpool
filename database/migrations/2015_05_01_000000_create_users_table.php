<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('prenomUsers', 40);
			$table->string('pseudoUsers', 40);
			$table->string('email', 50);
			$table->string('password', 60);
			$table->string('name',20);
			$table->string('telFixeUsers', 13)->nullable();
			$table->string('telPortUsers', 13);
			$table->float('soldeUsers', 100)->default(0);
			$table->date('dateNaissanceUsers');
			$table->string('photoUsers', 100)->nullable();
			$table->boolean('admin')->default(false);			
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
