<?php

namespace Src\Products\Application\Features\Commands\CreateProduct;

use Src\Common\Domain\Bus\Command\Command;
use Src\Common\Domain\Bus\Command\CommandHandler;
use Src\Common\Infrastructure\UnitOfWork;
use Src\Products\Infrastructure\Repositories\ProductRepository;

class CreateProductCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly UnitOfWork $unitOfWork
    ){}

    /**
     * @param CreateProductCommand<Command> $request
     */
    public function execute(Command $request): ?bool
    {
        return $this->unitOfWork->productRepository->register($request->name, $request->price);
    }
}
