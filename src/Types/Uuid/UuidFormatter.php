<?php

namespace Edd\MongoDbHelpers\Types\Uuid;

/**
 * Formatter for language-based UUIDs.
 *
 * Credit for this goes to the CSharp MongoDB driver development team.
 *
 * @link https://github.com/mongodb/mongo-csharp-driver/blob/master/uuidhelpers.js
 */

class UuidFormatter
{
    /**
     * Generate a UUID that matches what a Java application generated.
     *
     * @param string $uuid
     *
     * @return string
     */
    public static function java(string $uuid): string
    {
        $msb = substr($uuid, 0, 16);
        $lsb = substr($uuid, 16, 16);
        $msb = substr($msb, 14, 2) . substr($msb, 12, 2) . substr($msb, 10, 2) . substr($msb, 8, 2) . substr($msb, 6, 2) . substr($msb, 4, 2) . substr($msb, 2, 2) . substr($msb, 0, 2);
        $lsb = substr($lsb, 14, 2) . substr($lsb, 12, 2) . substr($lsb, 10, 2) . substr($lsb, 8, 2) . substr($lsb, 6, 2) . substr($lsb, 4, 2) . substr($lsb, 2, 2) . substr($lsb, 0, 2);

        return  $msb . $lsb;
    }

    /**
     * Generate a GUID that matches what a .NET/C# application generated.
     *
     * @param string $uuid
     *
     * @return string
     */
    public static function dotNet(string $uuid): string
    {
        $a = substr($uuid, 6, 2) . substr($uuid, 4, 2) . substr($uuid, 2, 2) . substr($uuid, 0, 2);
        $b = substr($uuid, 10, 2) . substr($uuid, 8, 2);
        $c = substr($uuid, 14, 2) . substr($uuid, 12, 2);
        $d = substr($uuid, 16, 16);

        return  $a . $b . $c . $d;
    }
}