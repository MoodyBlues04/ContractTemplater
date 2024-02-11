<?php

namespace App\Repositories;

use App\Http\Requests\User\StoreContractRequest;
use App\Models\Contract;
use App\Models\Template;

class ContractRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Contract::class);
    }

    public function createFromRequest(StoreContractRequest $request): Contract
    {
        /** @var Template $template */
        $template = Template::query()->findOrFail($request->template);
        /** @var Contract */
        return $template->contracts()->create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'data' => $request->fields,
        ]);
    }
}
