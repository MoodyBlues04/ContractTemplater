<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ExtraValidationRequest;
use App\Models\Template;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class FillTemplateRequest extends ExtraValidationRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'template' => 'required|integer|' . Rule::exists('templates', 'id'),
            'fields' => 'required|array'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function extraValidation(\Illuminate\Validation\Validator $validator): void
    {
        $data = $validator->getData();
        /** @var Template $template */
        $template = Template::query()->findOrFail($data['template']);
        $template->validateFields($data['fields']);
    }
}
