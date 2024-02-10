<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ExtraValidationRequest;
use App\Models\DocumentType;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class StoreDocumentRequest extends ExtraValidationRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'document_type' => 'required|integer|' . Rule::exists('document_types', 'id'),
            'name' => 'required|string',
            'fields' => 'required|array'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function extraValidation(\Illuminate\Validation\Validator $validator): void
    {
        $data = $validator->getData();
        /** @var DocumentType $documentType */
        $documentType = DocumentType::query()->findOrFail($data['document_type']);
        $documentType->validateFields($data['fields']);
    }
}
