<?php

namespace App\Services;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\User;
use App\Modules\Api\YandexCloudApi\Request\RecognizeDocRequest;
use App\Modules\Api\YandexCloudApi\Response\RecognizeDocResponse;
use App\Modules\Api\YandexCloudApi\YandexCloudApi;
use App\Modules\Api\YandexCloudApi\YandexVisionModels;
use App\Repositories\DocumentTypeRepository;
use GuzzleHttp\Exception\GuzzleException;

class DocumentService
{
    public function __construct(private DocumentTypeRepository $documentTypeRepository)
    {
    }

    /**
     * @throws GuzzleException
     * @throws \Exception
     */
    public function saveByImage(string $documentImage, User $user): Document
    {
        $encodedFile = base64_encode($documentImage);

        $api = new YandexCloudApi();
        $request = RecognizeDocRequest::passportRequest($encodedFile);
        $response = $api->recognizeDocument($request);

        return $this->saveRecognizedDocument($response, $user);
    }

    /**
     * @throws \Exception
     */
    public function saveRecognizedDocument(RecognizeDocResponse $response, User $user): Document
    {
        /** @var DocumentType $documentType */
        $documentType = $this->documentTypeRepository->firstBy(['name' => $response->getModelType()]);
        if (is_null($documentType)) {
            throw new \Exception("Invalid document model, no doc type: {$response->getModelType()}");
        }

        /** @var Document */
        return $documentType->documents()->create([
            'user_id' => $user->id,
            'name' => "$documentType->name $user->name",
            'data' => $this->getDocumentData($response),
        ]);
    }

    private function getDocumentData(RecognizeDocResponse $response): array
    {
        $documentData = [];
        foreach ($response->getEntities() as $entity) {
//            TODO datetime formatting
            $documentData[$entity['name']] = $entity['text'];
        }
        if ($response->getModelType() === YandexVisionModels::PASSPORT) {
            $documentData['passport_serial'] = substr($documentData['number'], 0, 4);
            $documentData['passport_number'] = substr($documentData['number'], 4);
            unset($documentData['number']);
        }
        return $documentData;
    }
}
