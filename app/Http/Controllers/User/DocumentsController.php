<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoadDocumentRequest;
use App\Http\Requests\User\StoreDocumentRequest;
use App\Http\Requests\User\UpdateDocumentRequest;
use App\Models\Document;
use App\Models\File;
use App\Models\User;
use App\Repositories\DocumentRepository;
use App\Repositories\DocumentTypeRepository;
use App\Services\DocumentService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class DocumentsController extends Controller
{
    public function __construct(
        private DocumentTypeRepository $documentTypeRepository,
        private DocumentRepository $documentRepository,
        private DocumentService $documentService
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
     * @throws \Exception
     * @throws GuzzleException
     */
    public function loadDocument(LoadDocumentRequest $request): RedirectResponse
    {
        /** @var UploadedFile $documentFile */
        $documentFile = $request->file('document_file');
        $file = File::storeUploadedFile($documentFile, 'documents');

        /** @var User $user */
        $user = auth()->user();
        $this->documentService->saveByImage($file->getFileContents(), $user);

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
