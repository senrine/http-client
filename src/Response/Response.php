<?php

namespace Nesrine\HttpClient\Response;

class Response implements ResponseInterface
{
    private string $response;
    private int $httpCode;

    public function __construct(string $response, int $httpCode)
    {
        $this->response = $response;
        $this->httpCode = $httpCode;
    }

    public function getStatusCode(): int
    {
        return $this->httpCode;
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function getBody(): string
    {
        return $this->response;
    }
}