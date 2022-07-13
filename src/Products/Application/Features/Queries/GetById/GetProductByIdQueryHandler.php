<?php

namespace Src\Products\Application\Features\Queries\GetById;

use Src\Common\Domain\Bus\Query\Query;
use Src\Common\Domain\Bus\Query\QueryHandler;
use Src\Common\Infrastructure\UnitOfWork;

class GetProductByIdQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly UnitOfWork $unitOfWork
    ){}

    /**
     * @param GetProductByIdQuery<Query> $request
     * @return mixed
     */
    public function execute(Query $request): mixed
    {
        return $this->unitOfWork->productRepository->getById($request->id);
    }
}
