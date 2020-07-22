<?php

namespace App\Model;

use App\Model\Middleware\GitHubRepositoryBasicStats;
use App\Model\Middleware\GitHubRepositoryReleaseData;

class GitHubRepository implements SerializableObjectInterface {

    private $owner;
    private $name;

    private $basicStats;
    private $lastestReleaseData;

    
    public function setOwner(string $owner): self {
        $this->owner = $owner;
        return $this;
    }
    
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }
    
    public function setBasicStats(GitHubRepositoryBasicStats $basicStats): self {
        $this->basicStats = $basicStats;
        return $this;
    }

    public function setLastestReleaseData(GitHubRepositoryReleaseData $lastestReleaseData): self {
        $this->lastestReleaseData = $lastestReleaseData;
        return $this;
    }
    
    public function getOwner(): string {
        return $this->owner;
    }
    
    public function getName(): string {
        return $this->name;
    }
    
    public function getBasicStats(): GitHubRepositoryBasicStats {
        return $this->basicStats;
    }
    
    public function getLastestReleaseData(): GitHubRepositoryReleaseData {
        return $this->lastestReleaseData;
    }
    
    public function getOwnerAndNameAsUrl(): string {
        return $this->owner . '/' . $this->name;
    }
    
    public function getSerializedName(): string {
        return 'git_hub_repository';
    }

}