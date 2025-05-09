<?php

namespace Edd\MongoDbHelpers\Types;

use JsonException;
use MongoDB\BSON\Document;
use MongoDB\Model\BSONArray;


class ArrayHelper
{
    /**
     * @param \MongoDB\Model\BSONArray $array
     *
     * @return array<mixed>
     * @throws JsonException
     */
    public static function toArray(BSONArray $array): array
    {
        return json_decode(Document::fromPHP($array)->toCanonicalExtendedJSON(), true, 512, JSON_THROW_ON_ERROR);
    }
}