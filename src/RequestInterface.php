<?php
namespace Bera\Joy;

interface RequestInterface 
{
    /**
     * @param string $url
     * @param array $params
     * @return void
     */
    public function setUrl(string $url, array $params) : void;
    
    /**
     * @param array $pay_load
     * @return string
     */
    public function fireRequest(array $pay_load=[]) : string;
}