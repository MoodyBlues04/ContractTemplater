<?php

namespace App\Services;

use App\Helpers\WordToPdf;
use App\Models\Contract;
use App\Models\File;
use App\Models\Template;
use PhpOffice\PhpWord\TemplateProcessor;

class TemplateFillingService
{
    /**
     * @throws \Exception
     */
    public function fillTemplate(Template $template, array $fieldsData, ?int $userId = null): Contract
    {
//        $template->validateFields($fieldsData);

        $templateProcessor = new TemplateProcessor(storage_path($template->file->path));

        $templateProcessor->setValues($fieldsData);

        $fileName = "app/public/contracts/{$template->id}_" . time();
        $docxName = $fileName . '.docx';
        $pdfName = $fileName . '.pdf';

        $templateProcessor->saveAs(storage_path($docxName));
        $docxFile = File::createFromPath($docxName);

        if (!WordToPdf::wordToPdf(storage_path($docxName), storage_path($pdfName))) {
            throw new \Exception("Word to pdf failed");
        }
        $pdfFile = File::createFromPath($pdfName);

        /** @var Contract */
        return $template->contracts()->create([
            'user_id' => $userId ?? auth()->user()->id,
            'docx_file_id' => $docxFile->id,
            'pdf_file_id' => $pdfFile->id,
            'data' => $fieldsData,
        ]);
    }
}
