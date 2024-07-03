<?php

namespace Nesrine\HttpClient\Request;

interface RequestInterface
{
    public function setMethod($method);

    public function setUrl($url);

    public function setHeaders(array $headers);

    public function setBody($body);

    public function getMethod();

    public function getUrl();

    public function getHeaders();

    public function getBody();
}
