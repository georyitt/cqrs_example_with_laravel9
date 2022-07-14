<?php

namespace Src\Products\Application\Features\Commands\CreateProduct;

class CreateProductCommand
{
    public function __construct(
        public readonly string $name,
        public readonly int $price
    ){}
}
