<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\DocumentTypeRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocumentsController extends Controller
{
    public function __construct(private DocumentTypeRepository $documentTypeRepository)
    {
        $this->middleware('user');
    }

    public function index(): View
    {
        $documentTypes = $this->documentTypeRepository->getAll();
        return view('user.documents', compact('documentTypes'));
    }
}
