<?php

namespace Edd\MongoDbHelpers\Helpers;

use MongoDB\BSON\Binary;

/**
 * Credit for this goes to the CSharp MongoDB driver development team.
 *
 * @link https://github.com/mongodb/mongo-csharp-driver/blob/master/uuidhelpers.js
 */
class UuidHelpers
{
    public static function toUuid(string $data): string
    {
        return 'TODO';
    }

    /**
     * Converts BSONBinary data to the C# GUID format.
     *
     * @param string $data
     *
     * @return string
     */
    public static function toCSharpGuid(string $data): string
    {
        $guid = new Binary($data, Binary::TYPE_OLD_UUID);
        $hex = bin2hex($guid->getData());

        // Credit for this goes to the CSharp MongoDB driver development team.
        // https://github.com/mongodb/mongo-csharp-driver/blob/fb932d4bd94af023ceafb9eccba8a35ab4a04b56/uuidhelpers.js#L80
        $a = substr($hex, 6, 2) . substr($hex, 4, 2) . substr($hex, 2, 2) . substr($hex, 0, 2);
        $b = substr($hex, 10, 2) . substr($hex, 8, 2);
        $c = substr($hex, 14, 2) . substr($hex, 12, 2);
        $d = substr($hex, 16, 16);
        $guidStr = $a . $b . $c . $d;

        return substr($guidStr, 0, 8) . '-' . substr($guidStr, 8, 4) . '-' . substr($guidStr, 12, 4) . '-' . substr($guidStr, 16, 4) . '-' . substr($guidStr, 20, 12);
    }

    public static function toJavaUuid(string $data): string
    {
        return 'TODO';
    }

    public static function toPythonUuid(string $data): string
    {
        return 'TODO';
    }

    public static function toHexUuid(string $data): string
    {
        return 'TODO';
    }
}