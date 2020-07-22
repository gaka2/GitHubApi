<?php

namespace App\Model;

interface SerializableObjectInterface {
    public function getSerializedName(): string;
}