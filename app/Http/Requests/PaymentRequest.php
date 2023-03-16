<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PaymentRequest extends FormRequest
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
            'card_name'     => ['required', 'string', 'min:3', 'max:100'],
            'card_nr'     => ['required', 'integer', 'min_digits:16', 'max_digits:16'],
            'card_end_date'     => ['required', 'string'],
            'card_svc'     => ['required', 'min_digits:3', 'max_digits:3',  'integer'],
        ];
    }
}
