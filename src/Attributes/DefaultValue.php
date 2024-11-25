<?php

namespace Edd\MongoDbHelpers\Attributes;

use Attribute;

/**
 * Specifies the default value for a field or property.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class DefaultValue
{
    public function __construct(
        public mixed $value
    ) {
    }
}