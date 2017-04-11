<?php

use Illuminate\Database\Seeder;

class VehiculeTableSeeder extends Seeder {

    public function run()
	{
		DB::table('T_VEHICULE')->insert([
			'nomVehicule' => 'Vehicule Perso',
			'marqueVehicule' => 'Peugeot 106',
			'couleurVehicule' => 'Rouge',
			'dateMiseEnService' => '2007-07-07',
			'nbPlacesVehicule' => 3,
			'user_id' => 1
		]);
		
		DB::table('T_VEHICULE')->insert([
			'nomVehicule' => 'Fun',
			'marqueVehicule' => 'Ferrarri',
			'couleurVehicule' => 'Noir',
			'dateMiseEnService' => '2005-10-15',
			'nbPlacesVehicule' => 4,
			'user_id' => 2
		]);
	}
}