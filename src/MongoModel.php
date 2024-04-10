<?php

namespace Edd\MongoDbHelpers;

use Edd\MongoDbHelpers\Attributes\Document;
use MongoDB\BSON\Persistable;
use MongoDB\Collection;
use ReflectionClass;

/**
 * An ODM-like Model.
 *
 * @since 2.0.0
 */
abstract class MongoModel implements Persistable
{
    private string $databaseName;

    protected Collection $collection;

    private string $collectionName;

    protected \MongoDB\BSON\ObjectId $id;

    public function __construct(private readonly ConnectionManager $connectionManager)
    {
        $this->getAttributeValues();
        $this->setCollection();
    }

    /**
     * @see https://www.php.net/manual/en/mongodb-bson-serializable.bsonserialize.php
     *
     * @return array<mixed>
     */
    public function bsonSerialize(): array {
        // TODO
        return [];
    }

    /**
     * @param array<mixed> $data
     * @see https://www.php.net/manual/en/mongodb-bson-unserializable.bsonunserialize.php
     *
     * @return void
     */
    public function bsonUnserialize(array $data): void {
        // TODO
    }

    /**
     * Converts model to array
     *
     * @return array<mixed>
     */
    public function toArray(): array
    {
        return [];
    }

    /**
     * Create a new document based on model.
     *
     * @return void
     */
    public function create() : void
    {
        $this->collection->insertOne($this);
    }

    /**
     * Set collection model will be based of.
     *
     * @return void
     */
    private function setCollection(): void
    {
        $this->collection = $this->connectionManager->mongo->selectCollection($this->databaseName, $this->collectionName);
    }

    /**
     * Process our attributes to help aid model.
     *
     * @return void
     */
    private function getAttributeValues(): void
    {
        foreach ((new ReflectionClass(get_class($this)))->getAttributes() as $attribute) {
            if ($attribute->getName() !== Document::class) {
                continue;
            }

            $vals = $attribute->getArguments();

            $this->collectionName = $vals[0] ?? get_class($this);
            $this->databaseName = $vals[1];
            break;
        }
    }
}