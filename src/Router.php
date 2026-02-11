<?php

namespace Framework;

class Router
{
    private ResponseFactory $responseFactory;
    /** @var Route[]  */
    public array $routes;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->routes = [];
        $this->responseFactory = $responseFactory;
    }

    /**
     * Dispatches the request
     * @param Request $request
     * @return Response
     */
    public function dispatch(Request $request): Response
    {
        foreach ($this->routes as $route) {
            if ($route->matches($request->method, $request->path)) {
                return $response = ($route->callback)();
            }
        }

        return $this->responseFactory->notFound();
    }

    public function addRoute(string $method, string $path, callable $callback): void
    {
        $this->routes[] = new Route($method, $path, $callback);
    }
}
