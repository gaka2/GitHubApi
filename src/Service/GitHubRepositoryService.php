<?php

namespace App\Service;

use App\Model\GitHubRepository;
use App\Service\GitHubApiClientService;

class GitHubRepositoryService {
        
    private $gitHubApiClientService;
    
    public function __construct(GitHubApiClientService $gitHubApiClientService) {
        $this->gitHubApiClientService = $gitHubApiClientService;
    }
    
    public function updateStatisticalData(GitHubRepository $gitHubRepository) {
        $basicStats = $this->gitHubApiClientService->getBasicDataForRepository($gitHubRepository);
        $gitHubRepository->setBasicStats($basicStats);
        
        $lastestReleaseData = $this->gitHubApiClientService->getLastestReleaseDataForRepository($gitHubRepository);
        $gitHubRepository->setLastestReleaseData($lastestReleaseData);
        
        return $gitHubRepository;
    }
}