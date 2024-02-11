<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\FillTemplateRequest;
use App\Models\Template;
use App\Repositories\ContractRepository;
use App\Repositories\TemplateRepository;
use App\Services\TemplateFillingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContractsController extends Controller
{
    public function __construct(
        private TemplateRepository $templateRepository,
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

        return view('user.contract', compact('templates'));
    }

    /**
     * @throws \Exception
     */
    public function fillTemplate(FillTemplateRequest $request): RedirectResponse
    {
        /** @var Template $template */
        $template = $this->templateRepository->getById($request->template);

        dd($request);

        if (!$this->templateFillingService->fillTemplate($template, $request->fields)) {
            throw new \Exception("Contract file not saved");
        }

        return redirect()->route('user.contract.index');
    }
}
