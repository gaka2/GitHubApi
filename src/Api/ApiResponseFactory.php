<?php

namespace App\Api;

use FOS\RestBundle\View\View;
use App\Model\SerializableObjectInterface;

class ApiResponseFactory {

    public static function createViewForObject(SerializableObjectInterface $object): View {
        $view = View::create([$object->getSerializedName() => $object]);
        $view->setFormat('json');
        return $view;
    }

}