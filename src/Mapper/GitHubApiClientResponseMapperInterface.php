<?php

namespace App\Mapper;

interface GitHubApiClientResponseMapperInterface {

    public function mapToObject(array $data);

}