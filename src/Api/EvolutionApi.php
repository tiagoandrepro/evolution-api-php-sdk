<?php

namespace Tiagoandrepro\EvolutionApi\Api;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Tiagoandrepro\EvolutionApi\Http\HttpClientInterface;

abstract class EvolutionApi
{
    protected HttpClientInterface $client;
    protected string $apiKey;

    public function __construct(HttpClientInterface $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    protected function createRequest(string $method, string $url, array $body = null): RequestInterface
    {
        $headers = [
            'Content-Type' => 'application/json',
            'apikey' => $this->apiKey
        ];

        $bodyContent = $body ? json_encode($body) : null;

        return new Request($method, $url, $headers, $bodyContent);
    }
}