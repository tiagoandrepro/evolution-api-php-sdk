<?php

namespace Tiagoandrepro\EvolutionApi\Client;

use GuzzleHttp\Client;
use Tiagoandrepro\EvolutionApi\Api\Group;
use Tiagoandrepro\EvolutionApi\Api\Instance;
use Tiagoandrepro\EvolutionApi\Api\Message;
use Tiagoandrepro\EvolutionApi\Http\HttpClientInterface;

class EvolutionApiClient
{
    private Instance $instanceApi;
    private Group $groupApi;
    private Message $messageApi;

    public function __construct(HttpClientInterface $client, string $apiKey)
    {
        $this->instanceApi = new Instance($client, $apiKey);
        $this->groupApi = new Group($client, $apiKey);
        $this->messageApi = new Message($client, $apiKey);
    }

    public function instance(): Instance
    {
        return $this->instanceApi;
    }

    public function group(): Group
    {
        return $this->groupApi;
    }

    public function message(): Message
    {
        return $this->messageApi;
    }
}