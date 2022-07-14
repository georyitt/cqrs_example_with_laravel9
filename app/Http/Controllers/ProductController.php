<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Common\Domain\CommandBus;
use Src\Common\Domain\QueryBus;
use Src\Products\Application\Features\Commands\CreateProduct\CreateProductCommand;
use Src\Products\Application\Features\Queries\GetAll\GetProductsQuery;
use Src\Products\Application\Features\Queries\GetById\GetProductByIdQuery;
use Symfony\Component\HttpFoundation\Response as STATUS;

class ProductController extends Controller
{
    public function __construct(
        private readonly CommandBus $commandBus,
        private readonly QueryBus $queryBus
    ){}

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'price' => 'numeric|required'
        ]);

        $command = new CreateProductCommand(
            name: $request->get('name'),
            price: $request->get('price')
        );

        $this->commandBus->dispatch(
            command: $command
        );

        return response()->json(
            status: STATUS::HTTP_CREATED,
            headers: ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            options: JSON_UNESCAPED_UNICODE
        );
    }

    public function get() {
        return response()->json(
            data: ['message' => $this->queryBus->dispatch(query: new GetProductsQuery())],
            status: STATUS::HTTP_OK,
            headers: ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            options: JSON_UNESCAPED_UNICODE);
    }

    public function getById(int $id) {
        return response()->json(
            data: ['message' => $this->queryBus->dispatch(query: new GetProductByIdQuery($id))],
            status: STATUS::HTTP_OK,
            headers: ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            options: JSON_UNESCAPED_UNICODE);
    }


}
