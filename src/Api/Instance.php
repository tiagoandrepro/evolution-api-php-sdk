<?php

namespace Tiagoandrepro\EvolutionApi\Api;


use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Instance extends EvolutionApi
{
    public function create(string $instanceName, string $token, bool $qrcode = true, bool $mobile = false, int $number = null, string $integration = 'WHATSAPP-BAILEYS'): ResponseInterface
    {
        $url = '/instance/create';
        $params = [
            'instanceName' => $instanceName,
            'token' => $token,
            'qrcode' => $qrcode,
            'mobile' => $mobile,
            'number' => $number,
            'integration' => $integration
        ];

        $request = $this->createRequest('POST', $url, $params);

        try {
            return $this->client->send($request);
        } catch (GuzzleException $e) {
            return new \GuzzleHttp\Psr7\Response(
                500,
                [],
                json_encode(['error' => 'Error: ' . $e->getMessage()])
            );
        }
    }

    public function show(): ResponseInterface
    {
        $url = '/instance/fetchInstances';
        $request = $this->createRequest('GET', $url);

        try {
            return $this->client->send($request);
        } catch (GuzzleException $e) {
            return new \GuzzleHttp\Psr7\Response(
                500,
                [],
                json_encode(['error' => 'Error: ' . $e->getMessage()])
            );
        }
    }

    public function state(string $instanceName): ResponseInterface
    {
        $url = '/instance/connectionState/' . $instanceName;
        $request = $this->createRequest('GET', $url);

        try {
            return $this->client->send($request);
        } catch (GuzzleException $e) {
            return new \GuzzleHttp\Psr7\Response(
                500,
                [],
                json_encode(['error' => 'Error: ' . $e->getMessage()])
            );
        }
    }

    public function restart(string $instanceName): ResponseInterface
    {
        $url = '/instance/restart/' . $instanceName;
        $request = $this->createRequest('PUT', $url);

        try {
            return $this->client->send($request);
        } catch (GuzzleException $e) {
            return new \GuzzleHttp\Psr7\Response(
                500,
                [],
                json_encode(['error' => 'Error: ' . $e->getMessage()])
            );
        }
    }

    public function logout(string $instanceName): ResponseInterface
    {
        $url = '/instance/logout/' . $instanceName;
        $request = $this->createRequest('DELETE', $url);

        try {
            return $this->client->send($request);
        } catch (GuzzleException $e) {
            return new \GuzzleHttp\Psr7\Response(
                500,
                [],
                json_encode(['error' => 'Error: ' . $e->getMessage()])
            );
        }
    }

    public function delete(string $instanceName): ResponseInterface
    {
        $url = '/instance/delete/' . $instanceName;
        $request = $this->createRequest('DELETE', $url);

        try {
            return $this->client->send($request);
        } catch (GuzzleException $e) {
            return new \GuzzleHttp\Psr7\Response(
                500,
                [],
                json_encode(['error' => 'Error: ' . $e->getMessage()])
            );
        }
    }
}