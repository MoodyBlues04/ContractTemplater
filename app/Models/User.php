<?php

namespace App\Models;

use App\Models\Enums\SubscriptionStatus;
use App\Models\Helpers\TariffOptions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property ?string $email_verified_at
 * @property string $phone
 * @property string $password
 * @property bool $is_admin
 * @property ?string $remember_token
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Subscription $subscription
 * @property Collection $contracts
 * @property Collection $documents
 * @property Collection $payments
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }

    public function hasTariffOption(string $option): bool
    {
        $option = $this->getTariffOption($option, 0);
        return !is_null($option) && $option > 0;
    }

    public function usedTariffOption(string $option): void
    {
        $optionValue = $this->getTariffOption($option);
        if (is_null($optionValue)) {
            return;
        }
        $this->setTariffOption($option, $optionValue - 1);
    }

    public function getTariffOption(string $option, $default = null): mixed
    {
        if (is_null($this->subscription)) {
            return null;
        }
        return $this->subscription->getTariffOption($option, $default);
    }

    public function setTariffOption(string $option, $value): void
    {
        if (is_null($this->subscription)) {
            return;
        }
        $this->subscription->setTariffOption($option, $value);
    }
}
