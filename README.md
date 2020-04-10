# HTTP REQUEST WRAPPER

A Simple HTTP Request Wrapper


## Usage

```php
require 'vendor/autoload.php';
$test = new \Bera\Joy\Request();
$url = 'https://jsonplaceholder.typicode.com/posts';
$test->get($url)->asArray();
print_r($test->response());

```

## License
[MIT]