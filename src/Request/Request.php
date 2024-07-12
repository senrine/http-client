<?php

namespace Nesrine\HttpClient\Request;

class Request implements RequestInterface
{
    private string $method ='';
    private string $url ='';
    private array $headers= [];
    private string $body = '';

    public function setMethod($method): self
    {
        $this->method = $method;
        return $this;
    }

    public function setUrl($url): self
    {
        $this->url = $url;
        return $this;
    }

    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    public function setBody($body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}