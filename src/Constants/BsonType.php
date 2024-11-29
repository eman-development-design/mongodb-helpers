<?php

namespace Edd\MongoDbHelpers\Constants;

/**
 * Represents the type of a BSON element.
 * @see https://www.mongodb.com/docs/manual/reference/bson-types/#bson-types
 */
enum BsonType: int
{
    case DOUBLE = 1;
    case STRING = 2;
    case OBJECT = 3;
    case ARRAY = 4;
    case BINARY = 5;
    case UNDEFINED = 6;
    case OBJECT_ID = 7;
    case BOOLEAN = 8;
    case DATE = 9;
    case NULL = 10;
    case REGULAR_EXPRESSION = 11;
    case DB_POINTER = 12;
    case JAVASCRIPT = 13;
    case SYMBOL = 14;
    case INT = 16;
    case TIMESTAMP = 17;
    case LONG = 18;
    case DECIMAL_128 = 19;
    case MIN_KEY = -1;
    case MAX_KEY = 127;
}
