<?php

namespace Edd\MongoDbHelpers;

abstract class DataSorting
{
    public const ASC = 1;
    public const DESC = -1;

    /**
     * Sort list builder for our sort query
     * @var array<string, int>
     */
    private static array $sortList = [];

    /**
     * Add a field to our sort list
     * @param string $field
     * @param int $order
     */
    public static function AddToSortList(string $field, int $order): void
    {
        self::$sortList[$field] = $order;
    }

    /**
     * Get our sort list.
     * @return array<string, int>
     */
    public static function GetSortList(): array
    {
        return self::$sortList;
    }
}