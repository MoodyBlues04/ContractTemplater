<?php

namespace App\Traits;

use App\Models\Field;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * @property Collection $fields
 */
trait HasFields
{
    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields->all();
    }

    public function getValidationRules(): array
    {
        $rules = [];
        foreach ($this->getFields() as $field) {
            $rules[$field->name] = [
                'required',
                $field->type,
            ];
        }
        return $rules;
    }

    /**
     * @throws ValidationException
     */
    public function validateFields(array $data): void
    {
        Validator::make($data, $this->getValidationRules())->validate();
    }

    abstract public function fields(): BelongsToMany;
}
