<?php

namespace App\Mapper;

use App\Model\Middleware\GitHubRepositoryBasicStats;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\Exception\NoSuchIndexException;

class BasicStatsMapper implements GitHubApiClientResponseMapperInterface {

    public function mapToObject(array $data) {
        try {
            $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()->enableExceptionOnInvalidIndex()->getPropertyAccessor();

            $stats = new GitHubRepositoryBasicStats();
            $stats->setForksNumber($propertyAccessor->getValue($data, '[forks_count]'));
            $stats->setStartsNumber($propertyAccessor->getValue($data, '[stargazers_count]'));
            $stats->setWatchersNumber($propertyAccessor->getValue($data, '[watchers_count]'));
            return $stats;
        } catch (NoSuchIndexException $e) {
            throw new \InvalidArgumentException('Invalid data passed to ' . __FUNCTION__ . ': ' . var_export($data, true));
        }
    }
}
