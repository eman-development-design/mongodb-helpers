<?php

namespace Edd\MongoDbHelpers\Attributes;

use Attribute;
use Edd\MongoDbHelpers\Constants\BsonType;
use Edd\MongoDbHelpers\Constants\DateTimeKind;

/**
 * Specifies serialization options for a DateTime field.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class DateTimeOptions
{
    public function __construct(
        public bool $dateOnly = false,
        public DateTimeKind $kind = DateTimeKind::UTC,
        public BsonType $representAs = BsonType::DATE
    ) {
    }
}