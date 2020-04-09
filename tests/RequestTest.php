<?php

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase 
{
    public function testForAGetReqestWithString()
    {
        $req = new \Bera\Joy\Request();
        $url = 'https://jsonplaceholder.typicode.com/posts';
        $req->get($url);
        $this->assertIsString($req->response());
    }

    public function testForAGetReqestWithArray()
    {
        $req = new \Bera\Joy\Request();
        $url = 'https://jsonplaceholder.typicode.com/posts';
        $req->get($url)->asArray();
        $this->assertIsArray($req->response());
    }

    public function testForAPostReqestWithString()
    {
        $req = new \Bera\Joy\Request();
        $url = 'https://jsonplaceholder.typicode.com/posts';
        $payload = array(
            'title' => 'foo',
            'body' => 'bar',
            'userId' => 1
        );
        $req->post($url,$payload);
        $this->assertIsString($req->response());
    }

    public function testForAPostReqestWithArray()
    {
        $req = new \Bera\Joy\Request();
        $url = 'https://jsonplaceholder.typicode.com/posts';
        $payload = array(
            'title' => 'foo',
            'body' => 'bar',
            'userId' => 1
        );
        $req->post($url,$payload)->asArray();
        $this->assertIsArray($req->response());
    }

}