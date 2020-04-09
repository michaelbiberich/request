<?php

namespace Bera\Joy;

use InvalidArgumentException;
use Bera\Joy\Exceptions\CurlException;

abstract class BaseRequest 
{
    /**
     * @var $extension_required
     */
    const EXTENSION_REQUIRED = 'curl';

    /**
     * @var $url
     */
    protected $url;

    /**
     * @var $params
     */
    protected $params;

    /**
     * @var $ch
     */
    protected $ch = null;

    /**
     * @return void
     * @throws CurlException
     */
    public function __construct()
    {
        if( !\extension_loaded(self::EXTENSION_REQUIRED) ) 
        {
            throw new CurlException( \sprintf(
                '%s extension is required'
            , self::EXTENSION_REQUIRED) );
        }
        $this->openCurlHandle();
    }

    protected function openCurlHandle()  : void
    {
        if(!is_null($this->ch))
            return;
        $this->ch = curl_init();
    }

    protected function closeCurlHandle() : Void
    {
        if(is_null($this->ch))
            return;
        curl_close($this->ch);
    }

    /**
     * @param string $url
     * @return void
     * @throws InvalidArgumentException
     */
    protected function setUrl(string $url, array $params) : void 
    {
        if( empty( $url ) ) {
            throw new InvalidArgumentException('url must be given');
        } 
       
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }


    /**
     * bulid query parms
     * @param $query_str
     */
    protected function buildParams(array $query_str) : void
    {
        $this->params = http_build_query($query_str);
    }
}

