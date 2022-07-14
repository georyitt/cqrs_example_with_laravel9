<?php

namespace Src\Products\Application\Features\Queries\GetAll;

use Illuminate\Database\Eloquent\Collection as CollectionEloquent;
use Illuminate\Support\Collection;
use Src\Common\Infrastructure\UnitOfWork;

class GetProductsQueryHandler
{
    public function __construct(
        private readonly UnitOfWork $unitOfWork
    ){}

    public function handle(GetProductsQuery $query): Collection|array|CollectionEloquent
    {
        return $this->unitOfWork->productRepository->getAll();
    }
}
