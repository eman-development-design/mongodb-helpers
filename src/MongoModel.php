<?php

namespace Edd\MongoDbHelpers;

use Edd\MongoDbHelpers\Attributes\Document;
use MongoDB\BSON\Persistable;
use MongoDB\Client;
use MongoDB\Collection;
use ReflectionClass;

/**
 * An ODM-like Model.
 */
abstract class MongoModel implements Persistable
{
    protected Client $mongo;

    private string $databaseName;

    protected Collection $collection;

    private string $collectionName;

    protected \MongoDB\BSON\ObjectId $id;

    public function __construct(?string $mongoUri = null)
    {
        $envMongoUri = getenv('MONGODB_URI');

        if ($mongoUri === null && $envMongoUri !== false) {
            $this->mongo = new Client((string) $envMongoUri);
        } else {
            $this->mongo = new Client($mongoUri);
        }

        $this->setCollection();
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

    public function create() : void
    {
        $this->collection->insertOne($this);
    }

    private function setCollection(): void
    {
        $this->getDocumentAttributeValues();

        $this->collection = $this->mongo->selectCollection($this->databaseName, $this->collectionName);
    }

    private function getDocumentAttributeValues(): void
    {
        foreach ((new ReflectionClass(get_class($this)))->getAttributes() as $attribute) {
            if ($attribute->getName() !== Document::class) {
                continue;
            }

            $vals = $attribute->getArguments();

            $this->collectionName = $vals[0];
            $this->databaseName = $vals[1];
            break;
        }
    }
}