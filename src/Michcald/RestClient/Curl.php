<?php

namespace Michcald\RestClient;

final class Curl
{
    private $ch;
    
    private $info = array();
    
    private $response;

    public function __construct()
    {
        $this->ch = curl_init();
    }

    public function setOption($option, $value)
    {
        curl_setopt($this->ch, $option, $value);
        
        return $this;
    }

    public function execute()
    {
        $this->response = curl_exec($this->ch);
        
        // Check if any error occurred
        if(!curl_errno($this->ch)) {
            $this->info = curl_getinfo($this->ch);
        }
    }
    
    public function getStatusCode()
    {
        return $this->info['http_code'];
    }
    
    public function getContentType()
    {
        return $this->info['content_type'];
    }
    
    public function getTotalTime()
    {
        return $this->info['total_time'];
    }
    
    public function getResponse()
    {
        return $this->response;
    }

    public function __destruct()
    {
        curl_close($this->ch);
    }
}
