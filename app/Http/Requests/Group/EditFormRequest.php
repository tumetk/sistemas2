<?php

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class EditFormRequest extends FormRequest
{
	public function rules() {
		return [
			'name' => [
				'required',
			    'max:255',
			    'unique:groups,name,' . $this->route('id')
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