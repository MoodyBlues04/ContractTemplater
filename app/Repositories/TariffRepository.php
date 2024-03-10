<?php

namespace App\Repositories;

use App\Models\Tariff;

class TariffRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Tariff::class);
    }
}
