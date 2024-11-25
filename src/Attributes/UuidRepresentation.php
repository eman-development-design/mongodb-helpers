<?php

namespace Edd\MongoDbHelpers\Attributes;

use Attribute;
use Edd\MongoDbHelpers\Constants\UuidRepresentationOption;

/**
 * Determines how to parse a UUID stored in a binary field.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class UuidRepresentation
{
    public function __construct(
        public UuidRepresentationOption $option
    ) {
    }
}