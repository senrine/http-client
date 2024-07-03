<?php

namespace Nesrine\HttpClient\Response;


interface ResponseInterface {
    public function getStatusCode();
    public function getHeaders();
    public function getBody();
}