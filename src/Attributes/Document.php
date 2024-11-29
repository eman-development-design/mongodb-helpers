<?php

namespace Edd\MongoDbHelpers\Attributes;

use Attribute;

/**
 * Specifies class is a document model.
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Document
{
    public function __construct(
        public string $database,
        public ?string $collection = null
    ) {
    }
}