<?php

namespace App\Modules\Api\YandexCloudApi\Response;

use App\Modules\Api\ApiResponse;
use App\Modules\Api\YandexCloudApi\YandexVisionModels;

class RecognizeDocResponse extends ApiResponse
{
    private string $modelType;

    public function __construct(array $response, string $modelType)
    {
        parent::__construct($response);

        YandexVisionModels::validate($modelType);
        $this->modelType = $modelType;
    }

    public function getEntities(): array
    {
        return $this->response['result']['textAnnotation']['entities'];
    }

    public function getModelType(): string
    {
        return $this->modelType;
    }

    public function rules(): array
    {
        return [
            'result' => 'required|array',
            'result.textAnnotation' => 'required|array',
            'result.textAnnotation.entities' => 'nullable|array',
            'result.textAnnotation.entities.*' => 'nullable|array',
            'result.textAnnotation.entities.*.name' => 'nullable|string',
            'result.textAnnotation.entities.*.text' => 'nullable|string',
        ];
    }
}
