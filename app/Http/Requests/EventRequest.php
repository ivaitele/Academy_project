<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
            'title'        => ['required', 'string', 'min:4', 'max:255'],
            'price'       => ['required', 'integer', 'min:0'],
            'venue'       => ['required', 'string', 'min:3'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'status'      => ['required', 'string'],
            'detail'      => ['nullable', 'string', 'min:3'],
            'image'        => ['nullable', 'file', 'max:1024'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Privalomas renginio pavadinimas',
            'title.string'   => 'Pavadinima turi sudaryti lotyniški simboliai',
            'title.min'      => 'Minimalus pavadinimo ilgis privalo būti :min simboliai',
            'title.max'      => 'Maximalus pavadinimo ilgis privalo būti :max simboliai',
            // ....
        ];
    }
}
