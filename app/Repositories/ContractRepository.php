<?php

namespace App\Repositories;

use App\Models\Contract;

class ContractRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Contract::class);
    }
}
