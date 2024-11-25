<?php

namespace Edd\MongoDbHelpers\Constants;

enum FieldTypes
{
    case STRING;
    case INT;
    case FLOAT;
    case DOUBLE;
    case DATE;
    case DATETIME;
    case BOOLEAN;
    case ARRAY;
    case OBJECT;
    case OBJECT_ID;
}
