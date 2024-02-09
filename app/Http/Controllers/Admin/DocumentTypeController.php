<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDocumentTypeRequest;
use App\Repositories\DocumentTypeRepository;
use App\Repositories\FieldRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocumentTypeController extends Controller
{
    public function __construct(
        private DocumentTypeRepository $documentTypeRepository,
        private FieldRepository $fieldRepository
    ) {
        $this->middleware('admin');
    }

    public function index(): View
    {
        $documentTypes = $this->documentTypeRepository->getAll();
        return view('admin.document_type.index', compact('documentTypes'));
    }

    public function create(): View
    {
        $fieldOptions = $this->fieldRepository->getAll();
        return view('admin.document_type.create', compact('fieldOptions'));
    }

    public function store(StoreDocumentTypeRequest $request): RedirectResponse
    {
        $this->documentTypeRepository->createFromRequest($request);
        
        return redirect()->route('admin.document_type.index');
    }
}
