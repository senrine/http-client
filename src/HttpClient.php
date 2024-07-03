<?php

use Nesrine\HttpClient\Request\RequestInterface;
use Nesrine\HttpClient\Response\ResponseInterface;
use Nesrine\HttpClient\Response\Response;

class HttpClient
{
    private $options;

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function send(RequestInterface $request): Response
    {
        $request->
        setMethod($this->options['method'])
            ->setUrl($this->options['url'])
            ->setHeaders($this->options['headers'])
            ->setBody($this->options['body']);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request->getUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->getMethod());
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request->getHeaders());
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getBody());

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        return new Response($response, $httpCode);
    }

    public function get($url, $options = []): ResponseInterface
    {
        $this->options['method'] = 'GET';
        $this->options['url'] = $url;
        $this->options['headers'] = $options['headers'];
        $this->options['body'] = $options['body'];
        return $this->send($this->options);
    }

    public function post($url, $data = null, $options = []): ResponseInterface
    {
        $this->options['method'] = 'POST';
        $this->options['url'] = $url;
        $this->options['headers'] = $options['headers'];
        $this->options['body'] = $options['body'];

        $response = new Response($this->options['body'], 200);
        return $response;
    }

    public function put($url, $data = null, $options = []): ResponseInterface{
        $this->options['method'] = 'PUT';
        $this->options['url'] = $url;
        $this->options['headers'] = $options['headers'];
        $this->options['body'] = $options['body'];

        $response = new Response($this->options['body'], 200);
        return $response;
    }

    public function delete($url, $data = null, $options = []): ResponseInterface{
        $this->options['method'] = 'DELETE';
        $this->options['url'] = $url;
        $this->options['headers'] = $options['headers'];
        $this->options['body'] = $options['body'];

        $response = new Response($this->options['body'], 200);
        return $response;
    }
}