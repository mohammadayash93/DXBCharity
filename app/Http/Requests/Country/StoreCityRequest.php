<?php

namespace App\Http\Requests\Country;

use App\Http\Requests\Request;

class StoreCityRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function messages()
	{
		return [
		];
	}

	public function rules()
	{
		return [
			'name' => 'required|string|min:4|max:255',
			'ar_name' => 'required|string|min:4|max:255',
        ];
	}
}
