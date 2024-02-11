<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreContractRequest;
use App\Models\Contract;
use App\Models\Template;
use App\Repositories\ContractRepository;
use App\Repositories\TemplateRepository;
use App\Services\TemplateFillingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use PhpOffice\PhpWord\Exception\Exception;

class ContractsController extends Controller
{
    public function __construct(
        private TemplateRepository $templateRepository,
        private ContractRepository $contractRepository,
        private TemplateFillingService $templateFillingService
    ) {
        $this->middleware('user');
    }

    public function index(): View
    {
//        TODO attach document opportunity
//        TODO show page by link
        $templates = $this->templateRepository->getAll();
        $contracts = $this->contractRepository->getAll();

        return view('user.contract', compact('templates', 'contracts'));
    }

    /**
     * @throws \Exception
     */
    public function store(StoreContractRequest $request): RedirectResponse
    {
        $contract = $this->contractRepository->createFromRequest($request);

        /** @var Template $template */
        $template = $this->templateRepository->getById($request->template);

        if (!$this->templateFillingService->fillTemplate($contract, $template, $request->fields)) {
            $contract->delete();
            throw new \Exception("Contract file not saved");
        }

        return redirect()->route('user.contract.index');
    }
}
