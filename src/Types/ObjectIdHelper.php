<?php

namespace Edd\MongoDbHelpers\Types;

use DateTime;
use DateTimeImmutable;
use MongoDB\BSON\ObjectId as MongoObjectId;

class ObjectIdHelper
{
    public static function getData(MongoObjectId $objectId): string
    {
        return $objectId->serialize();
    }

    public static function getAsDateTime(MongoObjectId $objectId): DateTime
    {
        return (new DateTime())->setTimestamp($objectId->getTimestamp());
    }

    public static function getAsDateTimeImmutable(MongoObjectId $objectId): DateTimeImmutable
    {
        return (new DateTimeImmutable())->setTimestamp($objectId->getTimestamp());
    }
}