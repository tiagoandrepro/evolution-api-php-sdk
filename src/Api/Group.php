<?php

namespace Tiagoandrepro\EvolutionApi\Api;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;
class Group extends EvolutionApi
{
    public function fetchAllGroups(string $instanceName, bool $getParticipants = true): ResponseInterface
    {
        $url = "/group/fetchAllGroups/" . $instanceName . '?getParticipants=' . ($getParticipants ? 'true' : 'false');
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

    public function getGroupInviteCode(string $instanceName, string $groupJid): ResponseInterface
    {
        $url = '/group/inviteCode/' . $instanceName . '?groupJid=' . urlencode($groupJid);
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

}