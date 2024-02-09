<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\DocumentTypeRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocumentTypeController extends Controller
{
    public function __construct(private DocumentTypeRepository $documentTypeRepository)
    {
        $this->middleware('admin');
    }

    public function index(): View
    {
        $documentTypes = $this->documentTypeRepository->getAll();
        return view('admin.document_type.index', compact('documentTypes'));
    }
}
