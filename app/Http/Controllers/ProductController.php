<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Cqrs\CommandBus;
use Src\Cqrs\Commands\CreateProduct\CreateProductCommand;
use Src\Cqrs\Queries\GetAll\GetProductsQuery;
use Src\Cqrs\Queries\GetById\GetProductByIdQuery;
use Src\Cqrs\QueryBus;
use Symfony\Component\HttpFoundation\Response as STATUS;

class ProductController extends Controller
{
    public function __construct(
        private CommandBus $commandBus,
        private QueryBus $queryBus
    ){}

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'price' => 'numeric|required'
        ]);

        $result = $this->commandBus->handle(
            command: new CreateProductCommand(
                name: $request->name,
                price: $request->price
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
            data: ['message' => $this->queryBus->handle(new GetProductsQuery()),],
            status: STATUS::HTTP_OK,
            headers: ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            options: JSON_UNESCAPED_UNICODE);
    }

    public function getById(int $id) {
        return response()->json([
            'message' => $this->queryBus->handle(new GetProductByIdQuery($id)),
        ],STATUS::HTTP_OK, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }


}
