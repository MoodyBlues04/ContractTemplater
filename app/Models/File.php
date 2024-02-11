<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * @property int $id
 * @property string $path
 * @property string $created_at
 * @property string $updated_at
 */
class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'path',
    ];

    /**
     * @param UploadedFile $file
     * @param string $storagePath path from /storage/app/ folder
     * @return File
     * @throws \Exception
     */
    public static function storeUploadedFile(UploadedFile $file, string $storagePath): self
    {
        $originalName = $file->getClientOriginalName();

        if (!$file->storeAs($storagePath, $originalName)) {
            throw new \Exception("File saving failed");
        }

        return self::createFromPath("app/$storagePath/$originalName");
    }

    public static function createFromPath(string $path): File
    {
        /** @var File */
        return self::query()->create(['path' => $path]);
    }
}
