<?php

namespace Michcald\RestClient;

class Response
{
    private $statusCode;
    
    private $contentType;

    private $content;

    public function __construct() {}

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        
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

    public function setContent($content)
    {
        $this->content = $content;
        
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }
}
