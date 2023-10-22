<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:65000'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10248',
            'release_date' => ['required','date_format:Y-m-d'],
            'company_id' => ['required', 'integer', 'exists:companies,id',]
        ];
    }
}
