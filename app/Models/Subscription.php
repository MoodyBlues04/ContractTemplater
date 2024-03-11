<?php

namespace App\Models;

use App\Models\Helpers\TariffOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $tariff_id
 * @property array $remaining_options
 * @property string $period_start
 * @property string $period_end
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property Tariff $tariff
 */
class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'tariff_id',
        'period_start',
        'period_end',
        'status',
        'remaining_options',
    ];

    protected $casts = [
        'remaining_options' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tariff(): BelongsTo
    {
        return $this->belongsTo(Tariff::class, 'tariff_id');
    }

    public function getTariffOption(string $option, $default = null): mixed
    {
        return $this->getTariffOptionsHelper()->get($option, $default);
    }

    public function setTariffOption(string $option, $value): void
    {
        $helper = $this->getTariffOptionsHelper();
        $helper->set($option, $value);
        $this->remaining_options = $helper->getOptions();
        $this->save();
    }

    private function getTariffOptionsHelper(): TariffOptions
    {
        return TariffOptions::create($this->remaining_options);
    }
}
