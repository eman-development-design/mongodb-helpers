<?php

namespace Edd\MongoDbHelpers\Attributes;

use Attribute;
use Edd\MongoDbHelpers\Constants\BinaryDataType;

/**
 * Specifies that this is this field is a binary field.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class BinaryField
{
    public function __construct(
        public BinaryDataType $type,
        public ?string $name = null
    ) {
    }
}