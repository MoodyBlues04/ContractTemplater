<?php

namespace App\Helpers;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class WordDocument
{
    public function __construct(private PhpWord $document)
    {
    }

    public static function createFromFilePath(string $filePath): self
    {
        return new self(IOFactory::load($filePath));
    }

    /**
     * Returns all fields that match ${field_name} pattern
     * @return string[]
     */
    public function getTemplateFields(): array
    {
        $text = $this->getText();

        $matches = [];
        preg_match_all('/\$\{[a-zA-Z_\-0-9]+}/', $text, $matches);
        return array_map(function (string $match) {
            return substr($match, 2, strlen($match) - 3);
        }, $matches[0]);
    }

    public function getText(): string
    {
        $text = '';
        foreach ($this->document->getSections() as $section) {
            foreach ($section->getElements() as $el) {
                if (method_exists($el, 'getText')) {
                    $text .= $el->getText();
                }
            }
        }
        return $text;
    }
}
