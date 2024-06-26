<?php

namespace App\Http\Requests\Admin;

use App\Helpers\WordDocument;
use App\Http\Requests\ExtraValidationRequest;
use App\Models\Field;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreTemplateRequest extends ExtraValidationRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'preview_icon' => 'nullable|file|mimes:png,jpeg,jpg',
            'fields' => 'required|array',
            'fields.*' => 'required|integer|' . Rule::exists('fields', 'id'),
            'template_file' => 'sometimes|required_if:requestType,sick|mimes:doc,docx'
        ];
    }

    public function extraValidation(Validator $validator): void
    {
        if ($this->getTemplateFields() != $this->getFieldsNames()) {
            $validator->addFailure(
                'fields',
                'fields.equal_templates',
                ['Chosen fields must be equal to template\'s']
            );
        }
    }

    /**
     * @return string[]
     */
    private function getFieldsNames(): array
    {
        return array_map(function ($fieldId) {
            return Field::query()->findOrFail($fieldId)->name;
        }, $this->fields);
    }

    /**
     * @return string[]
     */
    private function getTemplateFields(): array
    {
        $filePath = $this->file('template_file')->getRealPath();

        $wordDoc = WordDocument::createFromFilePath($filePath);
        return $wordDoc->getTemplateFields();
    }
}
