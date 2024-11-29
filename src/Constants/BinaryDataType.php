<?php

namespace Edd\MongoDbHelpers\Constants;

/**
 * BSON Binary data types.
 * @see https://www.mongodb.com/docs/manual/reference/bson-types/#binary-data
 */
enum BinaryDataType: int
{
    case GENERIC = 0;
    case FUNCTION_DATA = 1;
    case BINARY_OLD = 2;
    case UUID_OLD = 3;
    case UUID = 4;
    case MD5 = 5;
    case ENCRYPTED = 6;
    case COMPRESSED_TIME_SERIES = 7;
    case PLACE_HOLDER = 8;
    case VECTOR_DATA = 9;
    case CUSTOM_DATA = 128;
}
