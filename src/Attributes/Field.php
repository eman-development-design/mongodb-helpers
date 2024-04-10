<?php

namespace Edd\MongoDbHelpers\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Field
{
    public function __construct(
        public string $type = "string",
        public ?string $name = null
    ) {
    }
}