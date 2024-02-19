<?php

namespace App\Modules\Api\YandexCloudApi\Request;

use App\Modules\Api\ApiRequest;
use App\Modules\Api\YandexCloudApi\YandexVisionModels;
use Illuminate\Validation\Rule;

class RecognizeDocRequest extends ApiRequest
{
    /**
     * @throws \Exception
     */
    public static function passportRequest(string $passportImgEncoded, array $langCodes = ['ru']): self
    {
        return new self([
            'content' => $passportImgEncoded,
            'model' => YandexVisionModels::PASSPORT,
            'mimeType' => 'string',
            'languageCodes' => $langCodes
        ]);
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'model' => 'required|' . Rule::in(YandexVisionModels::MODELS),
            'mimeType' => 'required|string',
            'languageCodes' => 'nullable',
        ];
    }
}
