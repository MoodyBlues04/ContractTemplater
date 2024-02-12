<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreContractRequest;
use App\Http\Requests\User\UpdateContractRequest;
use App\Models\Contract;
use App\Models\Document;
use App\Models\File;
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
        private ContractRepository $contractRepository,
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

        return view('user.contract.index', compact('templates', 'documents'));
    }

    /**
     * @throws \Exception
     */
    public function store(StoreContractRequest $request): RedirectResponse
    {
        /** @var Template $template */
        $template = $this->templateRepository->getById($request->template);
        /** @var Document $document */
        $document = $this->documentRepository->getById($request->document);

        $contract = $this->templateFillingService->fillTemplate($template, $document->data);

        return redirect()->route('user.contract.show', compact('contract'));
    }

    public function show(Contract $contract): View
    {
        return view('user.contract.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
//        TODO take back contracts table & pass it (and store)
//        TODO db schema
        dd($contract);
    }

    public function update(UpdateContractRequest $request, Contract $contract)
    {
        dd($request, $contract);
    }

    public function upload(Contract $contract): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return response()->download(storage_path($contract->pdfFile->path));
    }
}
