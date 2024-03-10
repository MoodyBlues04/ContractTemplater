<?php

namespace App\Models;

use App\Models\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property int $price
 * @property ?array $options
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Collection $subscriptions
 * @property Collection $payments
 */
class Tariff extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'options',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function createPayment(int $userId, ?string $description = null): Payment
    {
        /** @var Payment */
        return $this->payments()->create([
            'user_id' => $userId,
            'status' => PaymentStatus::CREATED,
            'sum' => $this->price,
            'description' => $description ?? "Payment for contract templater tariff: {$this->name}",
        ]);
    }
}
