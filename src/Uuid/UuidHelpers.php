<?php

namespace Edd\MongoDbHelpers\Uuid;

use MongoDB\BSON\Binary;

class UuidHelpers
{
    /**
     * Convert BSONBinary data to a UUID string.
     *
     * @param string $data
     *
     * @return string
     */
    public static function toUuidString(string $data): string
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
    public static function toUuidBinary(string $uuid): Binary
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
        $hex = UuidFormatter::java(bin2hex($data));

        return substr($hex, 0, 8) . '-' . substr($hex, 8, 4) . '-' . substr($hex, 12, 4) . '-' . substr($hex, 16, 4) . '-' . substr($hex, 20, 12);
    }

    /**
     * Sets a UUID as BSON Binary as a Java application would.
     *
     * @param string $uuid
     *
     * @return \MongoDB\BSON\Binary
     */
    public static function toJavaUuidBinary(string $uuid): Binary
    {
        $javaUuid = UuidFormatter::java(self::cleanUuid($uuid));

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
        $hex = UuidFormatter::dotNet(bin2hex($data));

        return substr($hex, 0, 8) . '-' . substr($hex, 8, 4) . '-' . substr($hex, 12, 4) . '-' . substr($hex, 16, 4) . '-' . substr($hex, 20, 12);
    }

    /**
     * Sets a UUID as BSON Binary as a .NET/C# application would.
     *
     * @param string $guid
     *
     * @return \MongoDB\BSON\Binary
     */
    public static function toDotNetGuidBinary(string $guid): Binary
    {
        $dotDotGuid = UuidFormatter::dotNet(self::cleanUuid($guid));

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
    public static function toPythonUuidBinary(string $uuid): Binary
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
}