<?php

namespace App\Repositories;

use App\Models\Field;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FieldRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Field::class);
    }
}