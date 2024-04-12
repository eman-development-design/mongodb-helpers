<?php

namespace Edd\MongoDbHelpers\Constants;

enum FieldTypes: string
{
    case STRING = 'string';
    case INT = 'int';
    case FLOAT = 'float';
    case DOUBLE = 'double';
    case DATE = 'date';
    case BOOLEAN = 'boolean';
    case ARRAY = 'array';
    case OBJECT = 'object';
    case OBJECT_ID = 'object_id';
}
