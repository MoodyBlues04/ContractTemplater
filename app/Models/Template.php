<?php

namespace App\Models;

use App\Traits\HasFields;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;

/**
 * @property int $id
 * @property int $file_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property File $file
 * @property Collection $contracts
 * @property Collection $fields
 */
class Template extends Model
{
    use HasFactory, HasFields;

    public const STORAGE_DIR = 'templates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'file_id',
    ];

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'template_fields');
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class, 'file_id');
    }
}
