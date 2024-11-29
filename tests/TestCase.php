<?php

namespace Tests;

use MongoDB\Client;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected Client $mongodbClient;

    protected function setupMongodbClient(): void
    {
        $this->mongodbClient = new Client('mongodb://localhost:27017/demo');
    }
}
