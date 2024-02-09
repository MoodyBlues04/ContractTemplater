<?php

namespace App\Repositories;

use App\Http\Requests\Admin\StoreTemplateRequest;
use App\Models\Template;

class TemplateRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Template::class);
    }

    public function createFromRequest(StoreTemplateRequest $request): Template
    {
        $path = Template::storeTemplate($request->file('template_file'));

        /** @var Template $template */
        $template = $this->create([
            'storage_path' => $path,
            'name' => $request->name,
        ]);
        $template->fields()->attach($request->fields);

        return $template;
    }
}
