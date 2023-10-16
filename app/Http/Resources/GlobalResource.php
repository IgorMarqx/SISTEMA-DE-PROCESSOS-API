<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\{JsonResponse, Request};

class GlobalResource extends JsonResource
{
    protected array $data;

    private int $httpCode;
    public function __construct(array $data, int $httpCode)
    {
        parent::__construct($data);
        $this->data['error']   = $data['error'];
        $this->data['message'] = $data['message'];
        $this->httpCode        = $httpCode;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'error'     => $this->data['error'],
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'path'      => $request->fullUrl(),
            'method'    => $request->method(),
            'status'    => $this->httpCode,
            'message'   => $this->data['message'],
        ];
    }

    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->setStatusCode($this->httpCode);
    }
}
