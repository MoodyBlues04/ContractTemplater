<?php

namespace App\Repositories;

use App\Models\DocumentType;

class DocumentTypeRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(DocumentType::class);
    }
}
