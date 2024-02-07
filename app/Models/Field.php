<?php

namespace App\Models;

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
 */
class Field extends Model
{
    use HasFactory;

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
}
