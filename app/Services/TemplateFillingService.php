<?php

namespace App\Services;

use App\Helpers\WordToPdf;
use App\Models\Template;
use PhpOffice\PhpWord\TemplateProcessor;

class TemplateFillingService
{
    /**
     * @throws \Exception
     */
    public function fillTemplate(Template $template, array $fieldsData): string
    {
//        $template->validateFields($fieldsData);

        $templateProcessor = new TemplateProcessor(storage_path($template->file->path));

        $templateProcessor->setValues($fieldsData);

        $baseFileName = storage_path("app/contracts/{$template->id}_" . time());
        $templateProcessor->saveAs("$baseFileName.docx");

        $isSaved = WordToPdf::wordToPdf("$baseFileName.docx", "$baseFileName.pdf");
        unlink("$baseFileName.docx");

        if (!$isSaved) {
            throw new \Exception("Word to pdf failed");
        }

        return $baseFileName;
    }
}
