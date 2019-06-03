# mongodb-helpers
Helper Objects to make writing MongoDB apps easier.

## Helpers

### Pagination Helper

You can easily add paging by extending ```DataSorting```

```php
class UserSorting extends DataSorting
{
    public const Email = 'Email';

    public const FirstName = 'FirstName';

    public const LastName = 'LastName';
}
```

you can then use it like so:

```php
UserSorting::AddToSortList(UserSorting::FirstName, UserSorting::ASC);
```

you then compile the sort list by doing this:

```php
$sort = UserSorting::GetSortList();
```

this wil allow you you add as many sorting rules as you want to a query.

### Model Helper

```MongoModelInterface``` is an interface helper that'll provide some helper methods for handling model data.

```php
use MongoDB\BSON\Serializable;
use MongoDB\Model\BSONDocument;
use Leaf\Model\MongoModel

class User implements Serializable, MongoModel
{
    public $userGuid;
    public $email;
    public $firstName;
    public $lastName;
    
    public function bsonSerialize() : array
    {
        return [
            'UserUuid' => $this->userUuid,
            'Email' => $this->email,
            'FirstName' => $this->firstName,
            'LastName' => $this->lastName
        ];
    }

    public function map(BSONDocument $document)
    {
        $this->userUuid = $document['UserUuid'];
        $this->email = $document['Email'];
        $this->firstName = $document['FirstName'];
        $this->lastName = $document['LastName'];
    }

    public function toArray() : array
    {
        return get_object_vars($this);
    }
}
```

```map``` helps you map a BSON Document result to your model properties.

```toArray``` is for presenting the data as an array.

### Repository Helper

```MongoRepository```  makes it easy to setup a basic repository style architecture, the constructor will create an instance of ```MongoDB\Client``` .

```SetCollection``` & ```GetCollection``` setup and provide an instance of ```MongoDB\Collection```.