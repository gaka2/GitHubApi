<?php

namespace App\Service;

use App\Model\AbstractRepositoriesComparison;
use App\Model\SimpleRepositoriesComparison;
use App\Model\GitHubRepository;



class SimpleRepositoryComparator implements RepositoryComparatorInterface {
    public function compare(GitHubRepository $repositoryFirst, GitHubRepository $repositorySecond): AbstractRepositoriesComparison {
        
        $hasMore = [];

        $firstForksNumber = $repositoryFirst->getBasicStats()->getForksNumber();
        $secondForksNumber = $repositorySecond->getBasicStats()->getForksNumber();
        if ($firstForksNumber > $secondForksNumber) {

            $hasMore['first'] = ['forks' => [$firstForksNumber, $secondForksNumber]];
        } else {
            $hasMore['second'] = ['forks' => [$secondForksNumber, $firstForksNumber]];
        }
        return new SimpleRepositoriesComparison($hasMore, $repositoryFirst, $repositorySecond);
    }
}