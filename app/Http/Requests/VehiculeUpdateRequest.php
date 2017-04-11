<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class VehiculeUpdateRequest extends Request {

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$id = $this->segment(2);
		return [
			'nomVehicule' => 'max:255',
			'marqueVehicule' => 'max:255',
			'couleurVehicule' => 'max:255'
		];
	}

}