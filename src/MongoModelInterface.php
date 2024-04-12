<?php

namespace Edd\MongoDbHelpers;

use MongoDB\Model\BSONDocument;

/**
 * @deprecated It's advised to use MongoModel instead, which takes care of a lot of boilerplate work.
 */
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