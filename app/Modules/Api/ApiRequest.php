<?php

namespace App\Modules\Api;

use Illuminate\Support\Facades\Validator;

abstract class ApiRequest
{
    /**
     * @throws \Exception
     */
    public function __construct(protected array $request)
    {
        $this->validate();
    }

    public function getRequestData(): array
    {
        return $this->request;
    }

    final public function get(string $key, $default = null): mixed
    {
        return $this->request[$key] ?? $default;
    }

    final public function set(string $key, $value): void
    {
        $this->request[$key] = $value;
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
        $validator = Validator::make($this->request, $this->rules());
        if ($validator->fails()) {
            throw new \Exception("Invalid request. Errors: {$validator->errors()->toJson()}");
        }
    }
}
