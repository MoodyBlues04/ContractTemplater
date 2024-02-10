<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;

/**
 * @property int $id
 * @property string $name
 * @property string $storage_path
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Collection $contracts
 * @property Collection $fields
 */
class Template extends Model
{
    use HasFactory;

    private const STORAGE_PREFIX = '/templates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'storage_path',
    ];

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'template_fields');
    }

    public static function storeTemplate(UploadedFile $file): string
    {
        $originalName = $file->getClientOriginalName();
        $path = self::STORAGE_PREFIX;

        $file->storeAs($path, $originalName);

        return "$path/$originalName";
    }
}
