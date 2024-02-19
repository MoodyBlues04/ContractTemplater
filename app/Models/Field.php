<?php

namespace App\Models;

use App\Models\Enums\FieldTypes;
use App\View\Objects\ModelToDropdownItem;
use App\View\Objects\ToDropdownItemInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $label
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Collection $documentTypes
 * @property Collection $templates
 */
class Field extends Model implements ToDropdownItemInterface
{
    use HasFactory, ModelToDropdownItem;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'label',
        'type',
    ];


    public function documentTypes(): BelongsToMany
    {
        return $this->belongsToMany(DocumentType::class, 'document_type_fields');
    }
    public function templates(): BelongsToMany
    {
        return $this->belongsToMany(Template::class, 'template_fields');
    }

    public function isDate(): bool
    {
        return $this->type === FieldTypes::DATE || $this->type === FieldTypes::DATETIME;
    }
}
