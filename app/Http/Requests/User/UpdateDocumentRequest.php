<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ExtraValidationRequest;

class UpdateDocumentRequest extends ExtraValidationRequest
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
            'fields' => 'required|array'
        ];
    }
}
