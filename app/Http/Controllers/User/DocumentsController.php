<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreDocumentRequest;
use App\Http\Requests\User\UpdateDocumentRequest;
use App\Models\Document;
use App\Repositories\DocumentRepository;
use App\Repositories\DocumentTypeRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class DocumentsController extends Controller
{
    public function __construct(
        private DocumentTypeRepository $documentTypeRepository,
        private DocumentRepository $documentRepository
    ) {
        $this->middleware('user');
    }

    public function index(): View
    {
        $documentTypes = $this->documentTypeRepository->getAll();
        $documents = $this->documentRepository->getAll();

        return view('user.document', compact('documentTypes', 'documents'));
    }

    public function store(StoreDocumentRequest $request): RedirectResponse
    {
        $this->documentRepository->createFromRequest($request);

        return redirect()->route('user.document.index');
    }

    /**
     * @throws ValidationException
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $document->documentType->validateFields($request->fields);
        $this->documentRepository->update([
            'name' => $request->name,
            'data' => $request->fields
        ], $document);

        return redirect()->route('user.document.index');
    }
}
