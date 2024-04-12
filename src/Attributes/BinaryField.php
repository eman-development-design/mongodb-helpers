<?php

namespace Edd\MongoDbHelpers\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class BinaryField
{
    public function __construct(
        public int $type,
        public ?string $name = null
    ) {
    }
}