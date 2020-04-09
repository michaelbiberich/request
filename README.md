A Simple HTTP Request Wrapper

#usage
----------
first make sure composer is installed and curl extension enabled.


sample use of making an get request

$url = 'https://jsonplaceholder.typicode.com/posts';
$test->get($url)->asArray();
print_r($test->response());

also you can convert result in array format from json

$url = 'https://jsonplaceholder.typicode.com/posts';
$test->get($url, $params)->asArray();
print_r($test->response());


sample use of making an post request

$url = 'https://jsonplaceholder.typicode.com/posts';

$payload = array(
    'title' => 'foo',
    'body' => 'bar',
    'userId' => 1
);
$test->post($url,$payload)->asArray();
print_r($test->response()); 