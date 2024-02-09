<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TemplateRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TemplateController extends Controller
{
    public function __construct(private TemplateRepository $templateRepository)
    {
        $this->middleware('admin');
    }

    public function index(): View
    {
        $templates = $this->templateRepository->getAll();
        return view('admin.template.index', compact('templates'));
    }
}
