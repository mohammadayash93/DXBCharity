<?php

namespace App\Http\Requests\Item;

use App\Http\Requests\Request;

class StoreItemRequest extends Request
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
			'title' => 'required|string|min:4|max:255',
			'address' => 'required|string|min:4|max:255',
        ];
	}
}
