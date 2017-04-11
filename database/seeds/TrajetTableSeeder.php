<?php

use Illuminate\Database\Seeder;

class TrajetTableSeeder extends Seeder {

    public function run()
	{
		DB::table('T_TRAJET')->insert([
			'villeDepartTrajet' => 'Paris',
			'villeArriveeTrajet' => 'Marseille',
			'dateDebutTrajet' => '2015-06-08',
			'nbPlacesTrajet' => 2,
			'heureDepartTrajet' => '16:00:00',
			'pppTrajet' => 30,
			'statutTrajet' => 0,
			'idConducteurTrajet' => 1
		]);
		
		DB::table('T_TRAJET')->insert([
			'villeDepartTrajet' => 'Moyvillers',
			'villeArriveeTrajet' => 'Troyes',
			'dateDebutTrajet' => '2015-08-015',
			'nbPlacesTrajet' =>3,
			'heureDepartTrajet' => '16:15:00',
			'pppTrajet' => 15,
			'statutTrajet' => 0,
			'idConducteurTrajet' => 2
		]);
	}
}