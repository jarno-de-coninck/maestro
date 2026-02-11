<?php

namespace Framework;

class ResponseFactory
{
    public function body(string $body): Response
    {
        $response = new Response($body);
        $response->responseCode = 200;
        return $response;
    }

    public function notFound(): Response
    {
        $response = new Response("Not Found");
        $response->responseCode = 404;
        return $response;
    }
}
