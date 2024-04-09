<?php

namespace Edd\MongoDbHelpers;

use MongoDB\Client;
use MongoDB\Collection;

abstract class MongoRepository
{
    /**
     * MongoDB Client Instance
     * @var \MongoDB\Client
     */
    protected Client $mongo;

    /**
     * MongoDB Collection Instance
     * @var \MongoDB\Collection
     */
    private Collection $collection;

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
    protected function SetCollection(string $dbName, string $collection): void
    {
        $this->collection = $this->mongo->selectCollection($dbName, $collection);
    }
}