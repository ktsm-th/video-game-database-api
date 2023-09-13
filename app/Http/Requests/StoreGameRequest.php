<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'release_date' => ['required','date_format:Y-m-d'],
            'publisher_id' => ['required', 'integer', 'exists:publishers,id'],
            'console_ids' => ['required', 'array'],
            'console_ids.*' => ['integer', 'exists:consoles,id'],
            'genre_ids'=>['required', 'array'],
            'genre_ids.*' => ['integer', 'exists:genres,id'],
        ];
    }
}
