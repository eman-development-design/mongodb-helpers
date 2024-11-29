<?php

namespace Edd\MongoDbHelpers\Attributes;

use Attribute;
use Edd\MongoDbHelpers\Constants\BsonType;

/**
 * Specifies details of a field.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Field
{
    public function __construct(
        public ?string $name = null,
        public BsonType $type = BsonType::STRING
    ) {
    }
}