<?php namespace App\Repositories;

use App\Vehicule;

class VehiculeRepository extends ResourceRepository {

    public function __construct(Vehicule $vehicule)
	{
		$this->model = $vehicule;
	}

}