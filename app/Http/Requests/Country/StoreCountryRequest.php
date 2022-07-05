<?php

namespace App\Http\Requests\Country;

use App\Http\Requests\Request;

class StoreCountryRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function messages()
	{
		return [
			'iso2.unique'=>'Country already existed in the system.',
		];
	}

	public function rules()
	{
		return [
			'name' => 'required|string|min:4|max:255',
			'ar_name' => 'required|string|min:4|max:255',
			'iso2' => 'required|string|min:2|max:2|unique:countries',
			'phonecode' => 'required|numeric',
        ];
	}
}
