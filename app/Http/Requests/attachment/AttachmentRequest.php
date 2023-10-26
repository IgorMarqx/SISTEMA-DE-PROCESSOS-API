<?php

namespace App\Http\Requests\attachment;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AttachmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
            'process_id' => ['required', 'numeric', 'process_exist'],
            'user_id' => ['required', 'numeric', 'user_exist'],
            'type_process' => ['required', 'string'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error'     => true,
            'message'   => $validator->errors()->first(),
            'path'      => $this->fullUrl(),
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'method'    => $this->getMethod(),
            'status'    => 422,
        ], 422));
    }
}
