<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
		'name' => 'required',
		'logo' => 'nullable|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
		'email' => 'nullable|email',
		'phone' => 'nullable|string|min:6'
        ];
    }
}
