<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'description' => ['string', 'max:65000'],
            'image' => ['string', 'max:255'],
            'release_date' => ['date_format:Y-m-d'],
            'company_id' => ['integer', 'exists:companies,id',]
        ];
    }
}
