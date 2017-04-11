<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request {

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'name' => 'required|alpha|max:20|unique:users',
			'email' => 'required|email|max:255|unique:users',
			'pseudoUsers' => 'required|alpha_num|max:20',
			'password' => 'confirmed|min:6',
			'telPortUsers' => 'required|digits:10',
			'telFixeUsers' => 'required|digits:10',
			'dateNaissanceUsers' => 'required|before:now',
			'photo' => 'required|image'
		];
	}

}