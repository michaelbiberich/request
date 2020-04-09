<?php

namespace Bera\Joy\Requests;

use Bera\Joy\RequestInterface;
use Bera\Joy\BaseRequest;

class Post extends BaseRequest implements RequestInterface
{
    /**
     * @param string $url
     * @param array $params
     * @return void
     */
    public function setUrl(string $url, array $params) : void
    {
        parent::setUrl($url, $params);
        $this->url = $url;
    }
    
    /**
     * @return string
     */
    public function fireRequest(array $pay_load=[]) : string
    {
        curl_setopt($this->ch, CURLOPT_URL,$this->url);
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,json_encode($pay_load));
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
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