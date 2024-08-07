<?php

namespace Tiagoandrepro\EvolutionApi\Api;


use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Message extends EvolutionApi
{
    public function sendTextMessage(string $instanceName, string $number, string $message, array $options = [
        "delay" => 1200,
        "presence" => "composing",
        "linkPreview" => true
    ]): ResponseInterface
    {
        $url = "/message/sendText/" . $instanceName;
        $params = [
            "number" => $number,
            "options" => $options,
            "textMessage" => [
                "text" => $message
            ]
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

    public function sendMediaMessage(
        string $instanceName,
        string $recipientNumber,
        string $mediaType,
        string $mediaUrl,
        string $caption = '',
        array  $options = [
            "delay" => 1200,
            "presence" => "composing",
            "linkPreview" => true
        ]): ResponseInterface
    {
        $url = '/message/sendMedia/' . $instanceName;
        $payload = [
            'number' => $recipientNumber,
            'options' => $options,
            'mediaMessage' => [
                'mediatype' => $mediaType,
                'caption' => $caption,
                'media' => $mediaUrl
            ]
        ];

        $request = $this->createRequest('POST', $url, $payload);

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

    public function sendAudioMessage(
        string $instanceName,
        string $recipientNumber,
        string $audioUrl,
        array  $options = [
            "delay" => 1200,
            "presence" => "composing",
            "linkPreview" => true
        ]): ResponseInterface
    {
        $url = '/message/sendWhatsAppAudio/' . $instanceName;
        $payload = [
            'number' => $recipientNumber,
            'options' => $options,
            'audioMessage' => [
                'audio' => $audioUrl
            ]
        ];

        $request = $this->createRequest('POST', $url, $payload);

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

    public function sendDocumentMessage(
        string $instanceName,
        string $recipientNumber,
        string $mediaType,
        string $mediaUrl,
        string $fileName,
        string $caption = '',
        array  $options = [
            "delay" => 1200,
            "presence" => "composing",
            "linkPreview" => true
        ]): ResponseInterface
    {
        $url = '/message/sendMedia/' . $instanceName;
        $payload = [
            'number' => $recipientNumber,
            'options' => $options,
            'mediaMessage' => [
                'mediatype' => $mediaType,
                'fileName' => $fileName,
                'caption' => $caption,
                'media' => $mediaUrl
            ]
        ];

        $request = $this->createRequest('POST', $url, $payload);

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