<?php

namespace Michcald\RestClient;

class Response
{
    private $statusCode;
    
    private $contentType;

    private $body;

    public function __construct() {}

    public function setStatusCode($statusCode)
    {
        $this->statusCode = (int)$statusCode;
        
        return $this;
    }
    
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        
        return $this;
    }
    
    public function getContentType()
    {
        return $this->contentType;
    }

    public function setBody($body)
    {
        $this->body = $body;
        
        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }
}
