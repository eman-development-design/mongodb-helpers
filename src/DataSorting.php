<?php
/**
 * This file is part of the mongodb-helpers package.
 *
 * (c) 2019 Eman Development & Design
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Edd\MongoDbHelpers;

/**
 * Class DataSorting
 * @package Edd\MongoDbHelpers
 */
abstract class DataSorting
{
    public const ASC = 1;
    public const DESC = -1;

    /**
     * @var array
     */
    private static $sortList = [];

    /**
     * Add a field to our sort list
     * @param string $field
     * @param int $order
     */
    public static function AddToSortList(string $field, int $order) : void
    {
        self::$sortList[$field] = $order;
    }

    /**
     * Get our sort list.
     * @return array
     */
    public static function GetSortList() : array
    {
        return self::$sortList;
    }
}