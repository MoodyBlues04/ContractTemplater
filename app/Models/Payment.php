<?php

namespace App\Models;

use App\Models\Enums\PaymentStatus;
use App\Models\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $tariff_id
 * @property string $status
 * @property int $sum
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property Tariff $tariff
 */
class Payment extends Model
{
    use HasFactory;

    public const CURRENCY_RUB = 'RUB';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'description',
        'status',
        'sum',
        'tariff_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tariff(): BelongsTo
    {
        return $this->belongsTo(Tariff::class, 'tariff_id');
    }

    public function succeed(): void
    {
        $this->status = PaymentStatus::PAID;
        $this->save();

        $this->user->subscription()->create([
            'period_start' => date('Y-m-d H:i:s'),
            'period_end' => date('Y-m-d H:i:s', strtotime('+1 month')),
            'tariff_id' => $this->tariff_id,
            'status' => SubscriptionStatus::STATUS_ACTIVE,
            'remaining_options' => $this->tariff->options,
        ]);
    }
}
