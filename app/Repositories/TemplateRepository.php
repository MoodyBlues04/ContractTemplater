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
        $templateFile = File::storeUploadedFile($request->file('template_file'), Template::STORAGE_DIR);
        $iconFile = null;
        if ($request->hasFile('preview_icon')) {
            $iconFile = File::storeUploadedFile($request->file('preview_icon'), Template::ICONS_DIR);
        }

        /** @var Template $template */
        $template = $this->create([
            'name' => $request->name,
            'description' => $request->description,
            'file_id' => $templateFile->id,
            'preview_icon_file_id' => is_null($iconFile) ? null : $iconFile->id,
        ]);
        $template->fields()->attach($request->fields);

        return $template;
    }
}
