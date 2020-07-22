<?php

namespace App\Service;

use App\Service\GitHubRepositoryService;
use App\Service\RepositoryComparatorInterface;
use App\Model\GitHubRepository;

class ApiService {

    private $gitHubRepositoryService;
    private $repositoryComparator;

    public function __construct(GitHubRepositoryService $gitHubRepositoryService, RepositoryComparatorInterface $repositoryComparator) {
        $this->gitHubRepositoryService = $gitHubRepositoryService;
        $this->repositoryComparator = $repositoryComparator;
    }

    public function getStatsForGitHubRepository(GitHubRepository $gitHubRepository) {
        $gitHubRepository = $this->gitHubRepositoryService->updateStatisticalData($gitHubRepository);
        return $gitHubRepository;
    }
    
    public function getComparisonForRepositories(GitHubRepository $repositoryFirst, GitHubRepository $repositorySecond) {
        $repositoryFirst = $this->getStatsForGitHubRepository($repositoryFirst);
        $repositorySecond = $this->getStatsForGitHubRepository($repositorySecond);
        
        return $this->repositoryComparator->compare($repositoryFirst, $repositorySecond);
    }
}