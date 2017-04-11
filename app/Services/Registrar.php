<?php namespace App\Services;

use App\User;
use Validator;
use Input;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|alpha|max:50|',
			'prenomUsers' => 'required|alpha|max:50',
			'pseudoUsers' => 'required|alpha_num|max:50|unique:users',
			'telPortUsers' => 'required|digits:10',
			'telFixeUsers' => 'digits:10',
			'dateNaissanceUsers' => 'required|before:now',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'photo' => 'required|image',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{	
		include("../public/functions/upload_image.php");
		$filename = saveImage($data['pseudoUsers']);
		
		if(isset($data['telFixeUsers'])){
			return User::create([
				'name' => $data['name'],
				'prenomUsers' => $data['prenomUsers'],
				'pseudoUsers' => $data['pseudoUsers'],
				'telPortUsers' => $data['telPortUsers'],
				'telFixeUsers' => $data['telFixeUsers'],
				'dateNaissanceUsers' => $data['dateNaissanceUsers'],
				'email' => $data['email'],
				'password' => $data['password'],
				'photoUsers' => $filename,
			]);
		}else{
			return User::create([
				'name' => $data['name'],
				'prenomUsers' => $data['prenomUsers'],
				'pseudoUsers' => $data['pseudoUsers'],
				'telPortUsers' => $data['telPortUsers'],
				'dateNaissanceUsers' => $data['dateNaissanceUsers'],
				'email' => $data['email'],
				'password' => $data['password'],
				'photoUsers' => $filename,
			]);
		}
	}

}
