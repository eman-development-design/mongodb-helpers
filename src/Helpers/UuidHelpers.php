<?php
/**
 * This file is part of the mongodb-helpers package.
 *
 * (c) 2024 Eman Development & Design
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Edd\MongoDbHelpers\Helpers;

use MongoDB\BSON\Binary;

/**
 * Credit for this goes to the CSharp MongoDB driver development team.
 *
 * @link https://github.com/mongodb/mongo-csharp-driver/blob/master/uuidhelpers.js
 */
class UuidHelpers
{
    /**
     * Convert BSONBinary data to a UUID string.
     *
     * @param string $data
     *
     * @return string
     */
    public static function toUuid(string $data): string
    {
        $hex = bin2hex($data);

        return substr($hex, 0, 8) . '-' . substr($hex, 8, 4) . '-' . substr($hex, 12, 4) . '-' . substr($hex, 16, 4) . '-' . substr($hex, 20, 12);
    }

    /**
     * Sets a UUID as BSON Binary.
     *
     * @param string $uuid
     *
     * @return \MongoDB\BSON\Binary
     */
    public static function asUuidBinary(string $uuid): Binary
    {
        $uuidCleaned = self::cleanUuid($uuid);

        return new Binary(self::to16ByteString($uuidCleaned), Binary::TYPE_UUID);
    }

    /**
     * Converts BSONBinary data to a Java UUID.
     *
     * @param string $data
     *
     * @return string
     */
    public static function toJavaUuid(string $data): string
    {
        $hex = self::java(bin2hex($data));

        return substr($hex, 0, 8) . '-' . substr($hex, 8, 4) . '-' . substr($hex, 12, 4) . '-' . substr($hex, 16, 4) . '-' . substr($hex, 20, 12);
    }

    /**
     * Sets a UUID as BSON Binary as a Java application would.
     *
     * @param string $uuid
     *
     * @return \MongoDB\BSON\Binary
     */
    public static function asJavaUuidBinary(string $uuid): Binary
    {
        $javaUuid = self::java(self::cleanUuid($uuid));

        return new Binary(self::to16ByteString($javaUuid), Binary::TYPE_OLD_UUID);
    }

    /**
     * Converts BSONBinary data to a .NET/C# GUID.
     *
     * @param string $data
     *
     * @return string
     */
    public static function toDotNetGuid(string $data): string
    {
        $hex = self::dotNet(bin2hex($data));

        return substr($hex, 0, 8) . '-' . substr($hex, 8, 4) . '-' . substr($hex, 12, 4) . '-' . substr($hex, 16, 4) . '-' . substr($hex, 20, 12);
    }

    /**
     * Sets a UUID as BSON Binary as a .NET/C# application would.
     *
     * @param string $uuid
     *
     * @return \MongoDB\BSON\Binary
     */
    public static function asDotNetUuidBinary(string $uuid): Binary
    {
        $dotDotGuid = self::dotNet(self::cleanUuid($uuid));

        return new Binary(self::to16ByteString($dotDotGuid), Binary::TYPE_OLD_UUID);
    }

    /**
     * Converts BSONBinary data to a Python UUID.
     *
     * @param string $data
     *
     * @return string
     */
    public static function toPythonUuid(string $data): string
    {
        $hex = bin2hex($data);

        return substr($hex, 0, 8) . '-' . substr($hex, 8, 4) . '-' . substr($hex, 12, 4) . '-' . substr($hex, 16, 4) . '-' . substr($hex, 20, 12);
    }

    /**
     * Sets a UUID as BSON Binary as a Python application would.
     *
     * @param string $uuid
     *
     * @return \MongoDB\BSON\Binary
     */
    public static function asPythonUuidBinary(string $uuid): Binary
    {
        $uuidCleaned = self::cleanUuid($uuid);

        return new Binary(self::to16ByteString($uuidCleaned), Binary::TYPE_OLD_UUID);
    }

    /**
     * Remove all extra characters from UUID string.
     *
     * @param string $uuid
     *
     * @return string
     */
    private static function cleanUuid(string $uuid): string
    {
        return preg_replace('/[{}-]/', '', $uuid) ?? '';
    }

    /**
     * Convert our UUID into a 16 byte string.
     *
     * @param string $uuid
     *
     * @return string
     */
    private static function to16ByteString(string $uuid): string
    {
        $max = strlen($uuid);
        $c = '';

        for ($i = 0; $i < $max; $i += 2) {
            $c .= chr((int) hexdec(substr($uuid,$i,2)));
        }

        return $c;
    }

    /**
     * Generate a UUID that matches what a Java application generated.
     *
     * @param string $uuid
     *
     * @return string
     */
    private static function java(string $uuid): string
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
    private static function dotNet(string $uuid): string
    {
        $a = substr($uuid, 6, 2) . substr($uuid, 4, 2) . substr($uuid, 2, 2) . substr($uuid, 0, 2);
        $b = substr($uuid, 10, 2) . substr($uuid, 8, 2);
        $c = substr($uuid, 14, 2) . substr($uuid, 12, 2);
        $d = substr($uuid, 16, 16);

        return  $a . $b . $c . $d;
    }
}