<?php
/**
 * This file is part of the mongodb-helpers package.
 *
 * (c) 2024 Eman Development & Design
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Edd\MongoDbHelpers;

use MongoDB\BSON\Persistable;

/**
 * An ODM-like Model.
 */
abstract class MongoModel implements Persistable
{
    /**
     * Converts model to array
     *
     * @return array<mixed>
     */
    public function toArray(): array
    {
        return [];
    }
}