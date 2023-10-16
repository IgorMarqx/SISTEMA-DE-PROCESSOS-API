<?php

namespace App\Http\Resources\auth;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\{JsonResponse, Request};

class TokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    private string $token;

    public function __construct($token)
    {
        parent::__construct($token);
        $this->token = $token;
    }

    public function toArray(Request $request): array
    {
        return [
            'error'   => false,
            'message' => 'Login success',
            'data'    => [
                'token' => $this->token,
            ],
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'path'      => $request->fullUrl(),
        ];
    }

    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->setStatusCode(201);
    }
}
