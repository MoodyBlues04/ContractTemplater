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
//        TODO show real contracts in view
//        TODO attach document opportunity
        $templates = $this->templateRepository->getAll();
        return view('user.contract', compact('templates'));
    }

    /**
     * @throws \Exception
     */
    public function store(StoreContractRequest $request): RedirectResponse
    {
        /** @var Template $template */
        $template = $this->templateRepository->getById($request->template);

        if (!$this->templateFillingService->fillTemplate($template, $request->name, $request->fields)) {
            throw new \Exception("Contract file not saved");
        }

        $this->contractRepository->createFromRequest($request);

        return redirect()->route('user.contract.index');
    }
}
