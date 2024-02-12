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

    public function getValidationRules(array $extraRules = []): array
    {
        $rules = [];
        foreach ($this->getFields() as $field) {
            $rules[$field->name] = array_merge([
                $field->type,
            ], $extraRules);
        }
        return $rules;
    }

    /**
     * @throws ValidationException
     */
    public function validateFields(array $data, array $extraRules = []): void
    {
        Validator::make($data, $this->getValidationRules($extraRules))->validate();
    }

    abstract public function fields(): BelongsToMany;
}
