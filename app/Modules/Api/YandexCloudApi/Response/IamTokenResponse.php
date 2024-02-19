<?php

namespace App\Modules\Api\YandexCloudApi\Response;

use App\Modules\Api\ApiResponse;

class IamTokenResponse extends ApiResponse
{
    public function rules(): array
    {
        return [
            'iamToken' => 'required|string',
            'expiresAt' => 'required|date',
        ];
    }
}
