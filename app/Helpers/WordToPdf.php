<?php

namespace App\Helpers;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;

class WordToPdf
{
    public static function wordToPdf(string $wordPath, string $pdfPath): bool
    {
        Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
        Settings::setPdfRendererPath('.');

        $phpWord = IOFactory::load($wordPath);
        $phpWord->setDefaultFontName('DejaVu Sans, sans-serif');
        return $phpWord->save($pdfPath, 'PDF');
    }
}
