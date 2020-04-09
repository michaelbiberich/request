<?php

namespace Bera\Joy;

use Bera\Joy\RequestInterface;

class RequestIni
{
    /**
     * @param object $req
     * @param string $url
     * @param array $params
     * @return string
     */
    public function execGetRequest(RequestInterface $req, string $url, array $params = []) : string
    {
        $req->setUrl($url,$params);
        return $req->fireRequest([]);
    }

    /**
     * @param object $req
     * @param string $url
     * @param array $payload
     * @return string
     */
    public function execPostRequest(RequestInterface $req, string $url, array $payload ) : string
    {
        $req->setUrl($url,[]);
        return $req->fireRequest($payload);
    }

    /**
     * @param object $rep
     * @return string
     */
    public function getUrl(RequestInterface $req) : string
    {
        return $req->getUrl();
    }

}