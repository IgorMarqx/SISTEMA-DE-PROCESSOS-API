<?php

namespace App\Http\Requests\user;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255', 'unique:users,email'],
            'password'  => ['required', 'min:5'],
            'admin'     => ['required', 'string', 'max:255', Rule::in(['user', 'admin', 'lawyer'])],
            'organ'     => ['nullable', 'string', 'max:255'],
            'office'    => ['nullable', 'string', 'max:255'],
            'capacity'  => ['nullable', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:255'],
            'cpf'       => ['unique:users', 'string', 'max:255', 'min:11'],
            'oab'       => ['nullable', 'string', 'max:255'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error'      => true,
            'message'    => $validator->errors()->first(),
            'path'       => $this->fullUrl(),
            'method'     => $this->getMethod(),
            'timestamps' => now()->format('Y-m-d H:i:s'),
            'status'     => 422,
        ], 422));
    }
}
