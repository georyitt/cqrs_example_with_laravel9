<?php

namespace Src\Cqrs\Queries\GetById;

use Src\Cqrs\Contracts\Query;

class GetProductByIdQuery implements Query
{
    public function __construct(public int $id)
    {
    }
}
