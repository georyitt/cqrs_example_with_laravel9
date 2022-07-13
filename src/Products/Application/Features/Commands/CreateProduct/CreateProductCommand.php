<?php

namespace Src\Products\Application\Features\Commands\CreateProduct;

use Src\Common\Domain\Bus\Command\Command;

class CreateProductCommand implements Command
{
    public function __construct(
        public readonly string $name,
        public readonly int $price
    ){}
}
