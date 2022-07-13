<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Common\Domain\Bus\Command\CommandBus;
use Src\Common\Domain\Bus\Query\QueryBus;
use Src\Products\Application\Features\Commands\CreateProduct\CreateProductCommand;
use Src\Products\Application\Features\Queries\GetAll\GetProductsQuery;
use Src\Products\Application\Features\Queries\GetById\GetProductByIdQuery;
use Symfony\Component\HttpFoundation\Response as STATUS;

class ProductController extends Controller
{
    public function __construct(
        private readonly CommandBus $commandBus,
        private readonly QueryBus   $queryBus
    ){}

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'price' => 'numeric|required'
        ]);

        $result = $this->commandBus->handle(
            request: new CreateProductCommand(
                name: $request->get('name'),
                price: $request->get('price')
            )
        );

        return response()->json(
            data: ['message' => $result ? "successful" : "error"],
            status: $result ? STATUS::HTTP_CREATED : STATUS::HTTP_BAD_REQUEST,
            headers: ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            options: JSON_UNESCAPED_UNICODE
        );
    }

    public function get() {
        return response()->json(
            data: ['message' => $this->queryBus->handle(request: new GetProductsQuery())],
            status: STATUS::HTTP_OK,
            headers: ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            options: JSON_UNESCAPED_UNICODE);
    }

    public function getById(int $id) {
        return response()->json(
            data: ['message' => $this->queryBus->handle(request: new GetProductByIdQuery($id))],
            status: STATUS::HTTP_OK,
            headers: ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            options: JSON_UNESCAPED_UNICODE);
    }


}
