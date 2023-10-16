<?php

namespace App\Http\Requests\filter;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CollectiveFilterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'collectiveFilter' => ['required'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error'     => true,
            'message'   => $validator->errors(),
            'path'      => $this->fullUrl(),
            'method'    => $this->getMethod(),
            'status'    => 422,
            'timestamp' => now(),
        ], 422));
    }
}
