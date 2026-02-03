<?php

namespace Framework;

class Kernel
{
    public function __construct()
    {
    }

    public function handle(Request $request): Response
    {
        $response = new Response(200, "Requested: $request->path");
        return $response;
    }
}
