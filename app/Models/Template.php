<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
