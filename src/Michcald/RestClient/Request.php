<?php

namespace Michcald\RestClient;

class Request
{
    private $auth;
    
    private $method;
    
    private $url;
    
    private $params = array();
    
    private $responseType;
    
    public function setAuth(Auth $auth)
    {
        $this->auth = $auth;
        
        return $this;
    }
    
    public function getAuth()
    {
        return $this->auth;
    }
    
    public function setMethod($method)
    {
        $this->method = $method;
        
        return $this;
    }
    
    public function getMethod()
    {
        return $this->method;
    }
    
    public function setUrl($url)
    {
        $this->url = $url;
        
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function addParam($key, $value)
    {
        $this->params[$key] = $value;
        
        return $this;
    }
    
    public function getParams()
    {
        return $this->params;
    }
    
    public function setResponseType($contentType)
    {
        $this->responseType = $contentType;
        
        return $this;
    }

    public function getResponseType()
    {
        return $this->responseType;
    }
}
