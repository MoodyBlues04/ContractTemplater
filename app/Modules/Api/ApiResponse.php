<?php

namespace App\Modules\Api;

use Illuminate\Support\Facades\Validator;

abstract class ApiResponse
{
    /**
     * @throws \Exception
     */
    public function __construct(protected array $response)
    {
        $this->validate();
    }

    final public function get(string $key, $default = null): mixed
    {
        return $this->response[$key] ?? $default;
    }

    public function rules(): array
    {
        return [];
    }

    /**
     * @throws \Exception
     */
    final public function validate(): void
    {
        $validator = Validator::make($this->response, $this->rules());
        if ($validator->fails()) {
            throw new \Exception("Invalid request. Errors: {$validator->errors()->toJson()}");
        }
    }
}
