<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Common\Domain\CommandBus;
use Src\Common\Domain\IlluminateCommandBus;
use Src\Cqrs\Contracts\QueryHandler;
use Src\Products\Application\Features\Commands\CreateProduct\CreateProductCommand;
use Src\Products\Application\Features\Commands\CreateProduct\CreateProductCommandHandler;
use Src\Products\Application\Features\Queries\GetAll\GetProductsQuery;
use Src\Products\Application\Features\Queries\GetAll\GetProductsQueryHandler;
use Src\Products\Application\Features\Queries\GetById\GetProductByIdQuery;
use Src\Products\Application\Features\Queries\GetById\GetProductByIdQueryHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->singleton(CommandBus::class, IlluminateCommandBus::class);

        /** @var CommandBus $bus */
        $bus = $this->app->make(CommandBus::class);
        $bus->map([
            CreateProductCommand::class => CreateProductCommandHandler::class,
            GetProductsQuery::class => GetProductsQueryHandler::class,
            GetProductByIdQuery::class => GetProductByIdQueryHandler::class,
        ]);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
