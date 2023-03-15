<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'min:3', 'max:255'],
            'slug'        => ['nullable', 'alpha_dash', 'min:3', 'max:255'],
            'summary'   => ['nullable', 'string', 'min:3', 'max:255'],
            'photo'       => ['nullable'],
            'status'   => ['nullable', 'string'],
        ];
    }
}
