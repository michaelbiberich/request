<?php
namespace Bera\Joy;

interface RequestInterface 
{
    public function setUrl(string $url, array $params) : void;
    
    public function fireRequest(array $pay_load=[]) : string;
}