<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class VehiculeCreateRequest extends Request {

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$id = $this->segment(2);
		return [
			'nomVehicule' => 'required|alpha_num|max:255',
			'marqueVehicule' => 'required|alpha_num|max:50',
			'couleurVehicule' => 'required|alpha|max:50',
			'dateMiseEnService' => 'required|before:now'
		];
	}

}