<?php

namespace Edd\MongoDbHelpers\Constants;

enum DateTimeKind: int
{
    case UNSPECIFIED = 0;
    case UTC = 1;
    case LOCALE = 2;
}
