<?php

namespace App\Services;

use App\Helpers\WordToPdf;
use App\Models\Contract;
use App\Models\Template;
use Illuminate\Validation\ValidationException;
use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\TemplateProcessor;

class TemplateFillingService
{
    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function fillTemplate(Template $template, string $contractName, array $fieldsData): bool
    {
        $template->validateFields($fieldsData);

        $templateProcessor = new TemplateProcessor($template->getFullPath());
        $templateProcessor->setValues($fieldsData);

        $wordFileName = Contract::contractStoragePath($contractName, '.docx');
        $templateProcessor->saveAs($wordFileName);

        return WordToPdf::wordToPdf($wordFileName, Contract::contractStoragePath($contractName, '.pdf'));
    }
}
