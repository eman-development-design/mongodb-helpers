<?php

namespace Tests\Entities;

use Edd\MongoDbHelpers\Attributes\BinaryField;
use Edd\MongoDbHelpers\Attributes\Document;
use Edd\MongoDbHelpers\Attributes\Field;
use MongoDB\BSON\Binary;

#[Document('Demo')]
class User
{
    #[BinaryField(Binary::TYPE_UUID, 'UserGuid')]
    public string $userGuid;

    #[Field]
    public string $name;
}