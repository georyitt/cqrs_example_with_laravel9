<?php

namespace Src\Cqrs\Queries\GetAll;

use Src\Cqrs\Commands\CreateProduct\Product;
use Src\Cqrs\Contracts\Query;
use Src\Cqrs\Contracts\QueryHandler;

class GetProductsQueryHandler implements QueryHandler
{
    public function execute(Query $query): mixed
    {
        return Product::get();
    }
}
