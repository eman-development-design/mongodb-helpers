<?php

namespace Tests\Entities;

use Edd\MongoDbHelpers\Attributes\BinaryField;
use Edd\MongoDbHelpers\Attributes\Document;
use Edd\MongoDbHelpers\Attributes\Field;
use Edd\MongoDbHelpers\Constants\BinaryDataType;

#[Document('Demo')]
class User
{
    #[BinaryField(BinaryDataType::UUID, 'UserGuid')]
    public string $userGuid;

    #[Field]
    public string $name;
}