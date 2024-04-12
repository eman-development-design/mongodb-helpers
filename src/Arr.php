<?php

namespace Edd\MongoDbHelpers;

use MongoDB\Model\BSONArray;
use function MongoDB\BSON\fromPHP;
use function MongoDB\BSON\toJSON;

class Arr
{
    public static function toArray(BSONArray $array): array
    {
        return json_decode(toJSON(fromPHP($array)), true, 512, JSON_THROW_ON_ERROR);
    }
}