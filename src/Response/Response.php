<?php

namespace Nesrine\HttpClient\Response;

class Response implements ResponseInterface
{
    private $response;
    private $httpCode;

    public function __construct($response, $httpCode)
    {
        $this->response = $response;
        $this->httpCode = $httpCode;
    }

    public function getStatusCode()
    {
        return $this->httpCode;
    }

    public function getHeaders()
    {
        return [];
    }

    public function getBody()
    {
        return $this->response;
    }
}