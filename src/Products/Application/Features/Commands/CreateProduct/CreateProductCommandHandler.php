<?php

namespace Src\Products\Application\Features\Commands\CreateProduct;

use Src\Common\Core\Domain\Bus\Command\Command;
use Src\Common\Core\Domain\Bus\Command\CommandHandler;
use Src\Common\Infrastructure\UnitOfWork;

class CreateProductCommandHandler
{
    public function __construct(
        private readonly UnitOfWork $unitOfWork
    ){}

    public function handle(CreateProductCommand $command)
    {
       $this->unitOfWork->productRepository->register($command->name, $command->price);
    }
}
