<?php

namespace Src\Cqrs\Commands\CreateProduct;

use Src\Cqrs\Contracts\Command;

class CreateProductCommand implements Command
{
    public function __construct(
        private string $name,
        private int $price
    ){}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
