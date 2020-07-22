<?php

namespace App\Service;

use App\Model\AbstractRepositoriesComparison;
use App\Model\GitHubRepository;

interface RepositoryComparatorInterface {

    public function compare(GitHubRepository $repositoryFirst, GitHubRepository $repositorySecond): AbstractRepositoriesComparison;

}