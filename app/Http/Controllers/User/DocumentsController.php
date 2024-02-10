<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreDocumentRequest;
use App\Repositories\DocumentRepository;
use App\Repositories\DocumentTypeRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        return view('user.document', compact('documentTypes'));
    }

    public function store(StoreDocumentRequest $request): RedirectResponse
    {
        $this->documentRepository->createFromRequest($request);

        return redirect()->route('user.document.index');
    }
}
