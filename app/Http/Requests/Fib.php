<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * This class authorizes and validates an incoming http request for route:
 *
 * **GET** `/api/account/dashboard/preview`
 */
class Fib extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'number' => 'integer|required'
        ];
    }

    /**
     * Include route params as part of validation data.
     *
     * @return array
     */
    public function validationData() : array
    {
        return array_merge($this->route()->parameters(), $this->all());
    }
}
