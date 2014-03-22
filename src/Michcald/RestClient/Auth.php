<?php

namespace Michcald\RestClient;

abstract class Auth
{
    abstract public function execute(Curl $curl);
}