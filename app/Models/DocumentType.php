<?php

namespace App\Models;

use App\Traits\HasFields;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Collection $fields
 * @property Collection $documents
 */
class DocumentType extends Model
{
    use HasFactory, HasFields;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'document_type_fields');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
