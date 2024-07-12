<?php

namespace Nesrine\HttpClient;

use Nesrine\HttpClient\Request\RequestInterface;
use Nesrine\HttpClient\Response\ResponseInterface;
use Nesrine\HttpClient\Response\Response;
use Nesrine\HttpClient\Request\Request;


class HttpClient{
    private array $options;
    private ?RequestInterface $currentRequest = null;



    public function send(): ResponseInterface
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->currentRequest->getUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->currentRequest->getMethod());
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->currentRequest->getHeaders());
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->currentRequest->getBody());

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($response === false){
            throw new \Exception("Curl error: " . curl_error($ch));
        }

        curl_close($ch);
        return new Response($response, $httpCode);
    }

    public function get($url, $options): void
    {
        $this->options['method'] = 'GET';
        $this->options['url'] = $url;
        $this->options['headers'] = $options['headers'] ?? [];
        $this->options['body'] = $options['body'] ?? '';

        try {
            $this->currentRequest = new Request();
            $this->currentRequest->setMethod($this->options['method'])
                ->setUrl($this->options['url'])
                ->setHeaders($this->options['headers'])
                ->setBody($this->options['body']);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    public function post($url, $data, $options = []): void
    {
        $this->options['method'] = 'POST';
        $this->options['url'] = $url;
        $this->options['headers'] = $options['headers'] ?? [];
        $this->options['body'] = json_encode($data);

        try {
            $this->currentRequest = new Request();
            $this->currentRequest->setMethod($this->options['method'])
                ->setUrl($this->options['url'])
                ->setHeaders($this->options['headers'])
                ->setBody($this->options['body']);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function put($url, $data, $options = []): void{
        $this->options['method'] = 'PUT';
        $this->options['url'] = $url;
        $this->options['headers'] = $options['headers'];
        $this->options['body'] = json_encode($data);

        try {
            $this->currentRequest = new Request();
            $this->currentRequest->setMethod($this->options['method'])
                ->setUrl($this->options['url'])
                ->setHeaders($this->options['headers'])
                ->setBody($this->options['body']);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function delete($url, $data, $options = []): void{
        $this->options['method'] = 'DELETE';
        $this->options['url'] = $url;
        $this->options['headers'] = $options['headers'];
        $this->options['body'] = json_encode($data);

        try {
            $this->currentRequest = new Request();
            $this->currentRequest->setMethod($this->options['method'])
                ->setUrl($this->options['url'])
                ->setHeaders($this->options['headers'])
                ->setBody($this->options['body']);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}