<?php

namespace App\Http\Requests\process;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProcessRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'               => ['required', 'string'],
            'user_id'            => ['numeric', 'required', 'user_exist'],
            'lawyer_id'          => ['numeric', 'required', 'user_exist'],
            'subject'            => ['required', 'string'],
            'jurisdiction'       => ['required', 'string'],
            'cause_value'        => ['required'],
            'justice_secret'     => ['required', 'in:0,1'],
            'free_justice'       => ['required', 'in:0,1'],
            'tutelary'           => ['required', 'in:0,1'],
            'priority'           => ['required', 'string'],
            'judgmental_organ'   => ['required', 'string'],
            'judicial_office'    => ['required', 'string'],
            'competence'         => ['required', 'string'],
            'url_collective'     => ['required', 'url', 'max:2048'],
            'url_notices'        => ['required', 'url', 'max:2048'],
            'email_coorporative' => ['required', 'email'],
            'email_client'       => ['required', 'email'],
            'type_process'       => ['required', 'string'],
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
