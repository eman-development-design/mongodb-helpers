<?php

namespace Edd\MongoDbHelpers;

use MongoDB\Client;

class ConnectionManager
{
    public Client $mongo;

    /**
     * @param string $mongoUri
     * @param array<mixed>  $uriOptions
     * @param array<mixed>  $driverOptions
     * @see https://www.php.net/manual/en/mongodb-driver-manager.construct.php
     */
    public function __construct(string $mongoUri, array $uriOptions = [], array $driverOptions = []) {
        $this->mongo = new Client($mongoUri, $uriOptions, $driverOptions);
    }
}