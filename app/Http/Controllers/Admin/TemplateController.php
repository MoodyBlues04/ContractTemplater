<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\WordDocument;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTemplateRequest;
use App\Repositories\FieldRepository;
use App\Repositories\TemplateRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class TemplateController extends Controller
{
    public function __construct(
        private TemplateRepository $templateRepository,
        private FieldRepository $fieldRepository
    ) {
        $this->middleware('admin');
    }

    public function index(): View
    {
        $templates = $this->templateRepository->getAll();
        return view('admin.template.index', compact('templates'));
    }

    public function create(): View
    {
        $fieldOptions = $this->fieldRepository->getAll();
        return view('admin.template.create', compact('fieldOptions'));
    }

    /**
     * @throws \Exception
     */
    public function store(StoreTemplateRequest $request): RedirectResponse
    {
        $this->templateRepository->createFromRequest($request);

        return redirect()->route('admin.template.index');
    }
}
