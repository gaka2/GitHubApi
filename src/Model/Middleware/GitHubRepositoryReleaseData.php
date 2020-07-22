<?php

namespace App\Model\Middleware;

class GitHubRepositoryReleaseData {

    private $date;

    public function getDate(): \DateTimeInterface {
        return $this->date;
    }
    
    public function setDate(\DateTimeInterface $date): self {
        $this->date = $date;
        return $this;
    }
}