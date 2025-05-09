<?php

namespace Edd\MongoDbHelpers\Types;

use DateTime;
use MongoDB\BSON\UTCDateTime;

class DateTimeHelper
{
    /**
     * Converts UTCDateTime to DateTime.
     *
     * @param \MongoDB\BSON\UTCDateTime $dateTime
     *
     * @return DateTime
     */
    public static function toDateTime(UTCDateTime $dateTime): DateTime
    {
        return $dateTime->toDateTime();
    }
}