<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreContractRequest;
use App\Http\Requests\User\UpdateContractRequest;
use App\Models\Contract;
use App\Models\Document;
use App\Models\Helpers\TariffOptions;
use App\Models\Template;
use App\Models\User;
use App\Repositories\DocumentRepository;
use App\Repositories\TemplateRepository;
use App\Services\ContractService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;

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
        /** @var User $user */
        $user = Auth::user();
        if (!$user->canByTariff(TariffOptions::CONTRACT_GENERATIONS)) {
            return redirect()->route('user.tariff.index');
        }

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

    /**
     * @throws CopyFileException
     * @throws CreateTemporaryFileException
     * @throws \Exception
     */
    public function update(UpdateContractRequest $request, Contract $contract): RedirectResponse
    {
        if (!$this->contractService->updateContract($contract, $request->fields)) {
            throw new \Exception('Contract data not saved');
        }

        return redirect()->route('user.contract.show', $contract);
    }

    public function upload(Contract $contract): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return response()->download(storage_path($contract->pdfFile->path));
    }
}
