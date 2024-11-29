<?php

namespace Edd\MongoDbHelpers\Attributes;

use Attribute;

/**
 * Specifies the field should not be serialized if the value is null.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class IgnoreIfNull
{
}