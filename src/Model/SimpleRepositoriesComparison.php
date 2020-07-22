<?php

namespace App\Model;

use App\Model\AbstractRepositoriesComparison;

class SimpleRepositoriesComparison extends AbstractRepositoriesComparison {
    
    private $data;
    private $repositoryFirst;
    private $repositorySecond;
    
    public function __construct($data, $repositoryFirst, $repositorySecond) {
        $this->data = $data;
        $this->repositoryFirst;
        $this->repositorySecond;
    }
    
    public function getSerializedName(): string {
        return 'repositories_comparison';
    }
}