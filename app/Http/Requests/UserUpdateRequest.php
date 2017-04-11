<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request {

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$id = $this->segment(2);
		return [
			'name' => 'alpha|max:255',
			'prenomUsers' => 'alpha|max:255',
			'email' => 'email|max:255|',
			'pseudoUsers' => 'alpha_num|max:20',
			'telFixeUsers' => 'digits:10',
			'telPortUsers' => 'required|digits:10',
			'photo' => 'image'
		];
	}

}