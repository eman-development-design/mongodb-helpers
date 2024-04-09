<?php

namespace Edd\MongoDbHelpers;

use MongoDB\Model\BSONDocument;

interface MongoModelInterface
{
    /**
     * Maps Mongo document to Model Object
     * @param BSONDocument $document
     */
    public function map(BSONDocument $document): void;

    /**
     * Converts object to array
     * @return array<mixed>
     */
    public function toArray(): array;
}