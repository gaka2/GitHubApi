<?php

namespace App\Model;

use App\Model\GitHubRepository;

class GitHubRepositoryBuilder {

    public static function createFromOwnerAndName(string $owner, string $name): GitHubRepository {
        $gitHubRepository = new GitHubRepository($owner, $name);
        $gitHubRepository->setOwner($owner);
        $gitHubRepository->setName($name);
        return $gitHubRepository;
    }
}