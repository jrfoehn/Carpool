<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrajetCreateRequest extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'villeDepartTrajet' => 'required|alpha_dash|max:255',
            'villeArriveeTrajet' => 'required|alpha_dash|max:255',
            'heureDepartTrajet' => 'required',
			'dateDebutTrajet' => 'required|after:now'
			];
    }

}