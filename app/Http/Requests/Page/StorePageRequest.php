<?php

namespace App\Http\Requests\Page;

use App\Http\Requests\Request;

class StorePageRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function messages()
	{
		return [
			'name.unique'=>'Page already existed in the system.',
		];
	}

	public function rules()
	{
		return [
			'name' => 'required|string|min:4|max:255|unique:pages',
			'ar_name' => 'required|string|min:4|max:255|unique:pages',
		];
	}
}
