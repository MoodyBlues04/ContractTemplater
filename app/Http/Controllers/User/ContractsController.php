<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\FillTemplateRequest;
use App\Models\Document;
use App\Models\Template;
use App\Repositories\ContractRepository;
use App\Repositories\DocumentRepository;
use App\Repositories\TemplateRepository;
use App\Services\TemplateFillingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContractsController extends Controller
{
    public function __construct(
        private TemplateRepository $templateRepository,
        private DocumentRepository $documentRepository,
        private TemplateFillingService $templateFillingService
    ) {
        $this->middleware('user');
    }

    public function index(): View
    {
//        TODO attach document opportunity
//        TODO show page by link
//        TODO edit contract data
        $templates = $this->templateRepository->getAll();
        $documents = $this->documentRepository->getAll();

        return view('user.contract', compact('templates', 'documents'));
    }

    /**
     * @throws \Exception
     */
    public function fillTemplate(FillTemplateRequest $request): RedirectResponse
    {
        /** @var Template $template */
        $template = $this->templateRepository->getById($request->template);
        /** @var Document $document */
        $document = $this->documentRepository->getById($request->document);

        $path = $this->templateFillingService->fillTemplate($template, $document->data);

        return redirect()->route('user.contract.index');
    }
}
