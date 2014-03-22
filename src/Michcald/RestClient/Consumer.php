<?php

namespace Michcald\RestClient;

abstract class Consumer
{
    private $request;
    
    public final function setRequest(Request $request)
    {
        $this->request = $request;
        
        return $this;
    }
    
    public final function getRequest()
    {
        return $this->request;
    }
    
    abstract public function execute();
}
