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

use MongoDB\Client;
use MongoDB\Collection;

/**
 * Class MongoRepository
 * @package Edd\MongoDbHelpers
 */
abstract class MongoRepository
{
    /**
     * MongoDB Client Instance
     * @var \MongoDB\Client
     */
    protected $mongo;

    /**
     * MongoDB Collection Instance
     * @var \MongoDB\Collection
     */
    private $collection;

    /**
     * MongoRepository constructor.
     * @param string $connStr
     */
    public function __construct(string $connStr)
    {
        $this->mongo = new Client($connStr);
    }

    /**
     * Get instance of MongoDB\Collection
     * @return \MongoDB\Collection
     */
    protected function GetCollection() : Collection
    {
        return $this->collection;
    }

    /**
     * Set an instance of MongoDB\Collection
     * @param string $dbName
     * @param string $collection
     */
    protected function SetCollection(string $dbName, string $collection) : void
    {
        $this->collection = $this->mongo->selectCollection($dbName, $collection);
    }
}