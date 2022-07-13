<?php

namespace Src\Common\Infrastructure;

use Src\Products\Infrastructure\Repositories\ProductRepository;

class UnitOfWork
{
    public function __construct(
        public readonly ProductRepository $productRepository
    ){}
}
