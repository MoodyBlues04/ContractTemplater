<?php

namespace App\Repositories;

use App\Http\Requests\Admin\StoreTemplateRequest;
use App\Models\File;
use App\Models\Template;

class TemplateRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Template::class);
    }

    /**
     * @throws \Exception
     */
    public function createFromRequest(StoreTemplateRequest $request): Template
    {
        $file = File::storeUploadedFile($request->file('template_file'), Template::STORAGE_DIR);

        /** @var Template $template */
        $template = $this->create([
            'name' => $request->name,
            'file_id' => $file->id
        ]);
        $template->fields()->attach($request->fields);

        return $template;
    }
}
