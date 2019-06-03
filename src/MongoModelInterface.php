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

use MongoDB\Model\BSONDocument;

/**
 * Interface MongoModelInterface
 * @package Edd\MongoDbHelpers\Model
 */
interface MongoModelInterface
{
    /**
     * Maps Mongo document to Model Object
     * @param array|BSONDocument $document
     */
    public function map(BSONDocument $document) : void;

    /**
     * Converts object to array
     * @return array
     */
    public function toArray() : array;
}