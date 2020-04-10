<?php

namespace Bera\Joy;

use Bera\Joy\Requests\Get;
use Bera\Joy\Requests\Post;
use Bera\Joy\RequestIni;

class Request
{
    /**
     * @var string|array
     */
    private $data;

    /**
     * @var string
     */
    private $url;

    /**
     * @var object
     */
    private $requet_ini = null;

    public function __construct()
    {
        if(\is_null($this->requet_ini))
        {
            $this->requet_ini = new RequestIni();
        }
    }

    /**
     * @param string $url
     * @param array $params
     * @return Request
     */
    public function get( string $url, array $params=[])
    {
        $get = new Get;
        $this->data = $this->requet_ini->execGetRequest($get, $url, $params);
        $this->url = $this->requet_ini->getUrl($get);
        return $this;
    }

    /**
     * @param string $url
     * @param array $params
     * @return Request
     */
    public function post(string $url, array $payload = [])
    {
        $post = new Post;
        $this->data = $this->requet_ini->execPostRequest($post, $url, $payload);
        $this->url = $this->requet_ini->getUrl($post);
        return $this;
    }

    /**
     * @return string|array
     */
    public function response() 
    {
        return $this->data;
    }

    /**
     * get url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * convert response data into associative array
     */
    public function asArray() : void
    {
        if(is_null($this->data))
            return;
        $this->data = json_decode($this->data,true);
    }
}
