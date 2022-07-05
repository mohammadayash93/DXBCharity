<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Request;

class UpdateCategoryRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function messages()
	{
		return [
			'name.unique'=>'Category already existed in the system.',
		];
	}

	public function rules()
	{
		return [
			'name' => 'required|string|min:4|max:255|unique:categories,name,'.$this->id,
			'ar_name' => 'required|string|min:4|max:255',
		];
	}
}
