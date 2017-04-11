<?php

use Illuminate\Database\Seeder;

class TrajetUserTableSeeder extends Seeder {

    public function run()
	{
		DB::table('trajet_user')->insert([
			'user_id' => 1,
			'trajet_id'=> 2
		]);
		
		DB::table('trajet_user')->insert([
			'user_id' => 3,
			'trajet_id'=> 1
		]);
		
		DB::table('trajet_user')->insert([
			'user_id' => 4,
			'trajet_id'=> 2
		]);
		
		DB::table('trajet_user')->insert([
			'user_id' => 2,
			'trajet_id'=> 1
		]);
			
	}
}