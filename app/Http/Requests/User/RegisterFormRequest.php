<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
	public function rules() {
		return [
			'name'	   => [
				'required',
				'max:255'
			],
			'email'    => [
				'required',
				'unique:users','email'
			],
			'password' => [
				'confirmed',
				'min:6'
			]
		];
	}

	public function authorize() {
		return true;
	}

	public function attributes()
	{
		return [
			'name'     => 'nombre',
			'password' => 'contraseña'
		];
	}
}