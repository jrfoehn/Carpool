<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrajetUpdateRequest extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'villeDepartTrajet' => 'max:255',
            'villeArriveeTrajet' => 'max:255',
        ];
    }

}