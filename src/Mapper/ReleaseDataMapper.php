<?php

namespace App\Mapper;

use App\Model\Middleware\GitHubRepositoryReleaseData;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\Exception\NoSuchIndexException;

class ReleaseDataMapper implements GitHubApiClientResponseMapperInterface {

    public function mapToObject(array $data) {
        try {
            $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()->enableExceptionOnInvalidIndex()->getPropertyAccessor();

            $release = new GitHubRepositoryReleaseData();
            $dateTime = $propertyAccessor->getValue($data, '[created_at]');
            $release->setDate(new \DateTime($dateTime));
            return $release;
        } catch (NoSuchIndexException $e) {
            throw new \InvalidArgumentException('Invalid data passed to ' . __FUNCTION__ . ': ' . var_export($data, true));
        }
    }
}
