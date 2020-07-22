<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use App\Service\ApiService;
use App\Model\GitHubRepositoryBuilder;
use App\Api\ApiResponseFactory;

class GitHubRepositoryController extends AbstractFOSRestController {
    
    private $apiService;

    public function __construct(ApiService $apiService) {
        $this->apiService = $apiService;
    }
    
    /**
     * @Route(
     *     name="get_stats",
     *     path="api/stats/{owner}/{name}",
     *     methods={"GET"},
     *   )
     */
    public function getStats(string $owner, string $name) {

        $gitHubRepository = GitHubRepositoryBuilder::createFromOwnerAndName($owner, $name);
        $gitHubRepository = $this->apiService->getStatsForGitHubRepository($gitHubRepository);

        $view = ApiResponseFactory::createViewForObject($gitHubRepository);
        return $this->handleView($view);
    }
    
    /**
     * @Route(
     *     name="compare_stats",
     *     path="api/compare/first/{firstOwner}/{firstRepo}/second/{secondOwner}/{secondRepo}",
     *     methods={"GET"},
     *   )
     */
    public function compareStats(string $firstOwner, string $firstRepo, string $secondOwner, string $secondRepo) {
        
        $repositoryFirst = GitHubRepositoryBuilder::createFromOwnerAndName($firstOwner, $firstRepo);
        $repositorySecond = GitHubRepositoryBuilder::createFromOwnerAndName($secondOwner, $secondRepo);
        
        $result = $this->apiService->getComparisonForRepositories($repositoryFirst, $repositorySecond);
        $view = ApiResponseFactory::createViewForObject($result);
        return $this->handleView($view);
    }
}