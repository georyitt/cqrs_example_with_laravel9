<?php

namespace Src\Common\Domain\Bus\Query;

use Illuminate\Support\Facades\App;
use ReflectionClass;

class QueryBus
{
    public function handle(Query $request): mixed
    {
        return $this->invokeHandler($request)->execute($request);
    }

    private function invokeHandler(Query $request): QueryHandler {
        $reflection = new ReflectionClass($request);
        $handlerName = str_replace("Query", "QueryHandler", $reflection->getShortName());
        $handlerName = str_replace($reflection->getShortName(), $handlerName, $reflection->getName());
        return App::make($handlerName);
    }
}
