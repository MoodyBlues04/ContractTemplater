<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\FieldRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FieldController extends Controller
{
    public function __construct(private FieldRepository $fieldRepository)
    {
        $this->middleware('admin');
    }

    public function index(): View
    {
        $fields = $this->fieldRepository->getAll();
        return view('admin.field.index', compact('fields'));
    }
}
