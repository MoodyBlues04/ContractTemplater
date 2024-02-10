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

    public function createFromRequest(StoreContractRequest $request): mixed
    {
        /** @var Template $template */
        $template = Template::query()->findOrFail($request->template);
        return $template->contracts()->create([
            'user_id' => $request->user()->id,
//        TODO better contract->doc & contract->pdf -> links to File model with all the stuff
            'storage_path' => Contract::contractStoragePath($request->name),
            'name' => $request->name,
            'description' => $request->description,
            'data' => $request->fields,
        ]);
    }
}
