<?php

namespace Edd\MongoDbHelpers;

use MongoDB\BSON\UTCDateTime;

class DateTime
{
    public static function toDateTime(UTCDateTime $dateTime): \DateTime
    {
        return $dateTime->toDateTime();
    }

//    public static function asDateTime(UTCDateTime $dateTime): UTCDateTime
//    {
//        return $dateTime->toDateTime();
//    }
}