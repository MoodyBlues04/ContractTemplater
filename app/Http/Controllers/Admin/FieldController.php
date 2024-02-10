<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFieldRequest;
use App\Models\Helpers\FieldTypes;
use App\Repositories\FieldRepository;
use Illuminate\Http\RedirectResponse;
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

    public function create(): View
    {
        $fieldTypes = FieldTypes::getAsDropdownItems();
        return view('admin.field.create', compact('fieldTypes'));
    }

    public function store(StoreFieldRequest $request): RedirectResponse
    {
        $this->fieldRepository->createFromRequest($request);

        return redirect()->route('admin.field.index');
    }
}
