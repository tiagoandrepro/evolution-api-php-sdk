<?php

namespace Tiagoandrepro\EvolutionApi\Http;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GuzzleHttpClientAdapter implements HttpClientInterface
{
    private Client $client;

    public function __construct(string $baseUri)
    {
        $this->client = new Client(['base_uri' => $baseUri]);
    }

    public function send(RequestInterface $request): ResponseInterface
    {
        return $this->client->send($request);
    }
}