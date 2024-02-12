<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $template_id
 * @property int $docx_file_id
 * @property int $pdf_file_id
 * @property string $data
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property Template $template
 * @property ?File $docxFile
 * @property ?File $pdfFile
 *
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
         'docx_file_id',
         'pdf_file_id',
         'data',
    ];

    protected $casts = [
         'data' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    public function docxFile(): BelongsTo
    {
        return $this->belongsTo(File::class, 'docx_file_id');
    }

    public function pdfFile(): BelongsTo
    {
        return $this->belongsTo(File::class, 'pdf_file_id');
    }
}
