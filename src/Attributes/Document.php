<?php

namespace Edd\MongoDbHelpers\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Document
{
    public string $collection;

    public string $database;

    public function __construct(string $collection, string $database) {
        $this->collection = $collection;
        $this->database = $database;
    }
}