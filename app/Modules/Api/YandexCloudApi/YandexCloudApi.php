<?php

namespace App\Modules\Api\YandexCloudApi;

use App\Modules\Api\Client;
use App\Modules\Api\YandexCloudApi\Request\RecognizeDocRequest;
use App\Modules\Api\YandexCloudApi\Response\IamTokenResponse;
use App\Modules\Api\YandexCloudApi\Response\RecognizeDocResponse;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;

class YandexCloudApi
{
    private string $oAuthToken;
    private string $iamToken;
    private string $folderId;
    private Client $client;

    /**
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function __construct()
    {
//        TODO store IAM token to DB & take it when expiration time is near (Redis)
        $this->client = new Client();
        $this->oAuthToken = env('YANDEX_CLOUD_OAUTH_TOKEN');
        $this->folderId = env('YANDEX_FOLDER_ID');
        $this->iamToken = $this->getIamToken()->get('iamToken');
    }

    /**
     * @return IamTokenResponse
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function getIamToken(): IamTokenResponse
    {
        $url = 'https://iam.api.cloud.yandex.net/iam/v1/tokens';
        $data = ['yandexPassportOauthToken' => $this->oAuthToken];
        $response = $this->client->post($url, $data);
        return new IamTokenResponse($response);
    }

    /**
     * @throws GuzzleException
     * @throws \Exception
     */
    public function recognizeDocument(RecognizeDocRequest $request): RecognizeDocResponse
    {
        $url = 'https://ocr.api.cloud.yandex.net/ocr/v1/recognizeText';
        $response = $this->client->post($url, $request->getRequestData(), $this->getAuthHeaders());
        return new RecognizeDocResponse($response, $request->get('model'));
    }

    /**
     * @throws GuzzleException
     */
    public function getClouds(): array
    {
        $url = 'https://resource-manager.api.cloud.yandex.net/resource-manager/v1/clouds';
        return $this->client->get($url, [], $this->getAuthHeaders());
    }

    /**
     * @throws GuzzleException
     */
    public function getFolders(): array
    {
        $url = 'https://resource-manager.api.cloud.yandex.net/resource-manager/v1/folders';
        $query = ['cloudId' => env('YANDEX_CLOUD_ID')];
        return $this->client->get($url, $query, $this->getAuthHeaders());
    }

    private function getAuthHeaders(): array
    {
        return [
            'Authorization' => "Bearer {$this->iamToken}",
            'x-folder-id' => $this->folderId,
        ];
    }
}
