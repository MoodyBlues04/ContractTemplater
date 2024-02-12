<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreContractRequest;
use App\Http\Requests\User\UpdateContractRequest;
use App\Models\Contract;
use App\Models\Document;
use App\Models\Template;
use App\Repositories\DocumentRepository;
use App\Repositories\TemplateRepository;
use App\Services\ContractService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContractsController extends Controller
{
    public function __construct(
        private TemplateRepository $templateRepository,
        private DocumentRepository $documentRepository,
        private ContractService $contractService
    ) {
        $this->middleware('user');
    }

    public function index(): View
    {
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

        $contract = $this->contractService->createContract($template, $document->data);

        return redirect()->route('user.contract.show', compact('contract'));
    }

    public function show(Contract $contract): View
    {
        return view('user.contract.show', compact('contract'));
    }

    public function edit(Contract $contract): View
    {
        return view('user.contract.edit', compact('contract'));
    }

    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $this->contractService->updateContract($contract, $request->fields);

        return redirect()->route('user.contract.show', $contract);
    }

    public function upload(Contract $contract): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return response()->download(storage_path($contract->pdfFile->path));
    }
}
