<?php

namespace App\Repositories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PaymentRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Payment::class);
    }
}
