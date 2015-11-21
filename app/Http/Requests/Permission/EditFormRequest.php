<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class EditFormRequest extends FormRequest
{
	public function rules() {
		return [
			'name' => [
				'required',
			    'max:255',
			    'unique:permissions,name,' . $this->route('id')
			]
		];
	}

	public function authorize() {
		return true;
	}

	public function attributes()
	{
		return [
			'name' => 'nombre',
		];
	}
}