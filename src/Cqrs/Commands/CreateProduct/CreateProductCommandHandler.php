<?php

namespace Src\Cqrs\Commands\CreateProduct;

use Exception;
use Log;
use Src\Cqrs\Contracts\Command;
use Src\Cqrs\Contracts\CommandHandler;

class CreateProductCommandHandler implements CommandHandler
{
    /**
     * @param CreateProductCommand $command
     */
    public function execute(Command $command): bool
    {
        try {
            $product = Product::create([
                'name' => $command->getName(),
                'price' => $command->getPrice()
            ]);
        }
        catch (Exception $ex) {
            if (config("APP_ENV") == "local") {
                Log::error($ex->getMessage());
            }
            return false;
        }

        return true;
    }
}
