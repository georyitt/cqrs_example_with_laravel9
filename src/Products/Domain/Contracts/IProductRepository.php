<?php

namespace Src\Products\Domain\Contracts;

interface IProductRepository
{
    public function getAll(): mixed;
    public function getById(int $id): mixed;
    public function register(string $name, int $price): bool;
}
