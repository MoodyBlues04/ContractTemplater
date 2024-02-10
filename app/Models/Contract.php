<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $template_id
 * @property string $name
 * @property string $description
 * @property string $storage_path
 * @property string $data
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property Template $template
 */
class Contract extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
         'user_id',
         'template_id',
         'name',
         'description',
         'storage_path',
         'data',
    ];

    protected $casts = [
         'data' => 'array',
    ];

    public static function contractStoragePath(string $name, string $ext = ''): string
    {
        return storage_path("app/contracts/{$name}{$ext}");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    public function getStoragePath(string $ext = ''): string
    {
        return self::contractStoragePath($this->name, $ext);
    }
}
