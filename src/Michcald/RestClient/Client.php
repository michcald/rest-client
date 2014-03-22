<?php

namespace Michcald\RestClient;

class Client
{
    private $auth;
    
    public function setAuth(Auth $auth)
    {
        $this->auth = $auth;
        
        return $this;
    }
    
    public function get($url, $params = array())
    {
        return $this->call('get', $url, $params);
    }

    public function post($url, $params = array())
    {
        return $this->call('post', $url, $params);
    }

    public function put($url, $params = array())
    {
        return $this->call('put', $url, $params);
    }

    public function delete($url, $params = array())
    {
        return $this->call('delete', $url, $params);
    }

    private function call($method, $url, $params = array())
    {
        $request = new Request();
        
        if ($this->auth) {
            $request->setAuth($this->auth);
        }
        
        $consumer = null;

        switch ($method) {
            case 'get':
                $consumer = new Consumer\Get();
                break;
            case 'post':
                $consumer = new Consumer\Post();
                break;
            case 'put':
                $consumer = new Consumer\Put();
                break;
            case 'delete':
                $consumer = new Consumer\Delete();
                break;
            default:
                throw new \Exception("Method '$method' not valid");
        }

        $request->setMethod($method)
            ->setUrl($url);
        
        foreach ($params as $key => $value) {
            $request->addParam($key, $value);
        }
        
        $consumer->setRequest($request);

        return $consumer->execute();
    }
}
