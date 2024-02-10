<?php

namespace App\Repositories;

use App\Http\Requests\User\StoreDocumentRequest;
use App\Models\Document;
use App\Models\DocumentType;

class DocumentRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Document::class);
    }

    public function createFromRequest(StoreDocumentRequest $request): Document
    {
        /** @var DocumentType $documentType */
        $documentType = DocumentType::query()->findOrFail($request->document_type);
        return $documentType->documents()->create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'data' => json_encode($request->fields),
        ]);
    }
}
