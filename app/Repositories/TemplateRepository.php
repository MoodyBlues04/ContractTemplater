<?php

namespace App\Repositories;

use App\Models\Template;

class TemplateRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Template::class);
    }
}
