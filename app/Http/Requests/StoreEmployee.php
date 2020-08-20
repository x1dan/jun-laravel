<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
		'first_name' => 'required|string|min:6',
		'last_name' => 'required|string|min:6',
		'company_id' => 'required|integer|exists:companies,id', 
		'email' => 'nullable|string|email',
		'phone' => 'nullable|string|min:6'
        ];
    }
}
