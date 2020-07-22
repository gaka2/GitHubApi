<?php

namespace App\Model\Middleware;

class GitHubRepositoryBasicStats {

    private $forksNumber;
    private $starsNumber;
    private $watchersNumber;

    public function getForksNumber(): int {
        return $this->forksNumber;
    }
    
    public function getStartsNumber(): int {
        return $this->starsNumber;
    }

    public function getWatchersNumber(): int {
        return $this->watchersNumber;
    }
    
    public function setForksNumber(int $number): self {
        $this->forksNumber = $number;
        return $this;
    }
    
    public function setStartsNumber(int $number): self {
        $this->starsNumber = $number;
        return $this;
    }

    public function setWatchersNumber(int $number): self {
        $this->watchersNumber = $number;
        return $this;
    }
}