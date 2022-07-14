<?php

namespace Src\Products\Application\Features\Queries\GetById;

use Src\Common\Core\Domain\Bus\Query\Query;
use Src\Common\Core\Domain\Bus\Query\QueryHandler;
use Src\Common\Infrastructure\UnitOfWork;

class GetProductByIdQueryHandler
{
    public function __construct(
        private readonly UnitOfWork $unitOfWork
    ){}

    public function handle(GetProductByIdQuery $command): mixed
    {
        return $this->unitOfWork->productRepository->getById($command->id);
    }
}
