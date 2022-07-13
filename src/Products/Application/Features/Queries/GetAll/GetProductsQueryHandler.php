<?php

namespace Src\Products\Application\Features\Queries\GetAll;

use Illuminate\Database\Eloquent\Collection as CollectionEloquent;
use Illuminate\Support\Collection;
use Src\Common\Domain\Bus\Query\Query;
use Src\Common\Domain\Bus\Query\QueryHandler;
use Src\Common\Infrastructure\UnitOfWork;

class GetProductsQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly UnitOfWork $unitOfWork
    ){}

    /**
     * @param GetProductsQuery<Query> $request
     * @return Collection|array|CollectionEloquent
     */
    public function execute(Query $request): Collection|array|CollectionEloquent
    {
        return $this->unitOfWork->productRepository->getAll();
    }
}
