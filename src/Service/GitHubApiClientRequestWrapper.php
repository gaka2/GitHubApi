<?php

namespace App\Service;

class GitHubApiClientRequestWrapper {

    private $url;
    private $queryParams = [];
    private const API_ROOT_URL = 'https://api.github.com/';
    
    public function __construct(string $endpointUrl) {
        $this->url = self::API_ROOT_URL . $endpointUrl;
    }

    public function setQueryParameter(string $paramName, $value): self {
        $this->queryParams[$paramName] = $value;
        return $this;
    }
    
    public function getFullUrl(): string {

        $fullUrl = $this->url;

        if (!empty($this->queryParams) > 0) {
            $fullUrl .= '?';
        }
        
        foreach ($this->queryParams as $paramName => $value) {
            $fullUrl .= $paramName . '=' . $value . '&';
        }

        return $fullUrl;
    }
}