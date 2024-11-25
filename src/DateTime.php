<?php

namespace Edd\MongoDbHelpers;

use MongoDB\BSON\UTCDateTime;

class DateTime
{
    public static function toDateTime(UTCDateTime $dateTime): \DateTime
    {
        return $dateTime->toDateTime();
    }
}