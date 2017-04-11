<?php namespace App\Repositories;

use App\Trajet;

class TrajetRepository extends ResourceRepository {

    public function __construct(Trajet $trajet)
    {
        $this->model = $trajet;
    }

}