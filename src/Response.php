<?php

namespace Framework;

class Response
{
    public int $responseCode;

    public string $body;

    public string $headers;

    public function __construct(string $body, string $headers = '', int $responseCode = 200)
    {
        $this->headers = $headers;
        $this->responseCode = $responseCode;
        $this->body = $body;
    }

    public function echo(): void
    {
        http_response_code($this->responseCode);

        echo $this->body;
    }
}
