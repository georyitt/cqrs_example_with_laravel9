<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Common\Domain\CommandBus;
use Src\Common\Domain\IlluminateCommandBus;
use Src\Common\Domain\IlluminateQueryBus;
use Src\Common\Domain\QueryBus;
use Src\Products\Application\Features\Commands\CreateProduct\CreateProductCommand;
use Src\Products\Application\Features\Commands\CreateProduct\CreateProductCommandHandler;
use Src\Products\Application\Features\Queries\GetAll\GetProductsQuery;
use Src\Products\Application\Features\Queries\GetAll\GetProductsQueryHandler;
use Src\Products\Application\Features\Queries\GetById\GetProductByIdQuery;
use Src\Products\Application\Features\Queries\GetById\GetProductByIdQueryHandler;

class CqrsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CommandBus::class, IlluminateCommandBus::class);
        $this->app->singleton(QueryBus::class, IlluminateQueryBus::class);

        $commandBus = $this->app->make(CommandBus::class);
        $commandBus->map([
            CreateProductCommand::class => CreateProductCommandHandler::class,
        ]);

        $QueryBus = $this->app->make(QueryBus::class);
        $QueryBus->map([
            GetProductsQuery::class => GetProductsQueryHandler::class,
            GetProductByIdQuery::class => GetProductByIdQueryHandler::class,
        ]);
    }

    public function boot(): void
    {
    }
}
