<?php

namespace Src\Products\Infrastructure\Repositories;

use Exception;
use Illuminate\Support\Collection;
use Src\Products\Domain\Contracts\IProductRepository;
use Src\Products\Domain\Models\Product;

class ProductRepository implements IProductRepository
{
    public function __construct(
        private readonly Product $product
    ){}

    /**
     * @return Collection<Product>
     */
    public function getAll(): Collection
    {
        return $this->product->get();
    }

    public function getById(int $id): mixed
    {
        return Product::find($id);
    }

    public function register(string $name, int $price): void
    {
        Product::create([
            'name' => $name,
            'price' => $price
        ]);
    }
}
