<?php

namespace Michcald\RestClient\Auth;

class Basic extends \Michcald\RestClient\Auth
{
    private $username;

    private $password;

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function execute(\Michcald\RestClient\Curl $curl, \Michcald\RestClient\Request $request)
    {
        $pwd = $this->username . ':' . $this->password;

        $curl->setOption(CURLOPT_HTTPAUTH, CURLAUTH_BASIC)
            ->setOption(CURLOPT_USERPWD, $pwd);
    }

}