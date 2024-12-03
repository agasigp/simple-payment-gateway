<?php

namespace App\Http\Requests;

use Closure;
use Illuminate\Foundation\Http\FormRequest;

class StoreDepositRequest extends FormRequest
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
            'order_id' => ['required', 'min:6', 'unique:deposits,order_id'],
            'amount' => [
                'required',
                'numeric',
                'regex:/^-?(0|[1-9]\d*)\.\d{2}$/',
                function (string $attribute, mixed $value, Closure $fail) {
                    if ((float) $value == 0) {
                        $fail('The ' . $attribute . ' cannot be 0.');
                    }
                },
            ],
            'timestamp' => ['required', 'date_format:Y-m-d H:i:s',]
        ];
    }
}
