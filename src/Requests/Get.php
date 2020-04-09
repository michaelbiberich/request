<?php

namespace Bera\Joy\Requests;

use Bera\Joy\RequestInterface;
use Bera\Joy\BaseRequest;

class Get extends BaseRequest implements RequestInterface
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function setUrl( string $url, array $params) : void
    {
        parent::setUrl($url, $params);
        $final_url = $url;
        if( !empty($params) ) {
            $this->buildParams($params);
            $final_url .= '?' . $this->params;
        }
        $this->url = $final_url;
    }

    /**
     * @return string
     */
    public function fireRequest(array $pay_load=[]) : string
    {
        curl_setopt($this->ch, CURLOPT_URL,  $this->url);
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($this->ch);
        $this->closeCurlHandle();
        return $data;
    }   

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }
}