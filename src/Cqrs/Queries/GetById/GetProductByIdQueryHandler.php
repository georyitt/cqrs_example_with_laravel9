<?php

namespace Src\Cqrs\Queries\GetById;

use Src\Cqrs\Commands\CreateProduct\Product;
use Src\Cqrs\Contracts\Query;
use Src\Cqrs\Contracts\QueryHandler;

class GetProductByIdQueryHandler implements QueryHandler
{
    /**
     * @param GetProductByIdQuery $query
     */
    public function execute(Query $query): mixed
    {
        return Product::find($query->id);
    }
}
