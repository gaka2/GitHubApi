<?php

namespace App\Service;

use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;

use Symfony\Component\HttpFoundation\Response;

use App\Mapper\GitHubApiClientResponseMapperInterface;
use App\Mapper\BasicStatsMapper;
use App\Mapper\ReleaseDataMapper;

use App\Model\GitHubRepository;

class GitHubApiClientService {

    private $client;
    private $logger;

    public function __construct(ClientInterface $client, LoggerInterface $logger) {
        $this->client = $client;
        $this->logger = $logger;
    }    
    
    public function getBasicDataForRepository(GitHubRepository $gitHubRepository) {
        return $this->getDataFromExternalApi(new GitHubApiClientRequestWrapper('repos/' . $gitHubRepository->getOwnerAndNameAsUrl()), new BasicStatsMapper());
    }
    
    public function getLastestReleaseDataForRepository(GitHubRepository $gitHubRepository) {
        return $this->getDataFromExternalApi(new GitHubApiClientRequestWrapper('repos/' . $gitHubRepository->getOwnerAndNameAsUrl() . '/releases/latest'), new ReleaseDataMapper());
    }
        
    private function getDataFromExternalApi(GitHubApiClientRequestWrapper $gitHubApiRequest, GitHubApiClientResponseMapperInterface $mapper) {
        try {

            $request = $this->client->createRequest('GET', $gitHubApiRequest->getFullUrl());
            $response = $this->client->sendRequest($request);

            $statusCode = $response->getstatusCode();
            if ($statusCode !== Response::HTTP_OK) {
                throw new \RuntimeException('External API returned wrong status code:' . $statusCode);
            }
            
            $dataFromApi = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
            return $mapper->mapToObject($dataFromApi);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            $this->logger->error($e->getTraceAsString());

            throw new \RuntimeException($e);
        }
    }
}
