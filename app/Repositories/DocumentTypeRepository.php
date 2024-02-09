<?php

namespace App\Repositories;

use App\Http\Requests\Admin\StoreDocumentTypeRequest;
use App\Models\DocumentType;

class DocumentTypeRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(DocumentType::class);
    }

    public function createFromRequest(StoreDocumentTypeRequest $request): DocumentType
    {
        /** @var DocumentType $documentType */
        $documentType = $this->create($request->only('name'));
        $documentType->fields()->attach($request->fields);

        return $documentType;
    }
}
