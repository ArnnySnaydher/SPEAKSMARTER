<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use  Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> ['required','string','max:100',Rule::unique(table:'categories',column: 'name')->ignore(id: request('category'),idcolumn:'id')]
        ];
    }

    public function messages():array{
        return [
            'name.unique' => ('The category already exists')
        ];
    }
}
