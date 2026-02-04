<?php

namespace Framework;

class Router
{
    /** @var Route[]  */
    public array $routes;

    public function __construct()
    {
        $this->routes = [];
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
                $response = new Response(200, "$route->return");
                break;
            }
        }

        if (!isset($response)) {
            $response = new Response(404, "Not Found");
        }

        return $response;
    }

    public function addRoute(string $method, string $path, string $return): void
    {
        $this->routes[] = new Route($method, $path, $return);
    }
}
