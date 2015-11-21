<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
	public function rules() {
		return [
			'name' => [
				'required',
			    'max:255',
			    'unique:permissions'
			]
		];
	}

	public function authorize() {
		return true;
	}

	public function attributes()
	{
		return [
			'name' => 'nombre'
		];
	}
}