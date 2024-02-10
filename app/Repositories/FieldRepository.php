<?php

namespace App\Repositories;

use App\Http\Requests\Admin\StoreFieldRequest;
use App\Models\Field;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FieldRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Field::class);
    }

    public function createFromRequest(StoreFieldRequest $request): Field
    {
        return $this->create($request->only(['name', 'label', 'type']));
    }
}
