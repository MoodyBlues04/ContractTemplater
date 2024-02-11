<?php

namespace App\Services;

use App\Helpers\WordToPdf;
use App\Models\Template;
use Illuminate\Validation\ValidationException;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\TemplateProcessor;

class TemplateFillingService
{
    /**
     * @throws ValidationException
     */
    public function fillTemplate(Template $template, array $fieldsData): bool
    {
        $template->validateFields($fieldsData);

        try {
            $templateProcessor = new TemplateProcessor(storage_path($template->file->path));
        } catch (CopyFileException|CreateTemporaryFileException $e) {
            return false;
        }

        $templateProcessor->setValues($fieldsData);

//        $wordFileName = $contract->getStoragePath('.docx');
//        $templateProcessor->saveAs(storage_path($wordFileName));
//        $contract->docxFile()->create(['path' => $wordFileName]);
//
//        $pdfFileName = $contract->getStoragePath('.pdf');
//        if (!WordToPdf::wordToPdf(storage_path($wordFileName), storage_path($pdfFileName))) {
//            return false;
//        }
//        $contract->pdfFile()->create(['path' => $pdfFileName]);

        return true;
    }
}
