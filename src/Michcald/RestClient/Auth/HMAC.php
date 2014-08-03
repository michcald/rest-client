<?php

namespace Michcald\RestClient\Auth;

class HMAC extends \Michcald\RestClient\Auth
{
    private $publicKey;

    private $privateKey;

    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;

        return $this;
    }

    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;

        return $this;
    }

    public function execute(\Michcald\RestClient\Curl $curl, \Michcald\RestClient\Request $request)
    {
        $content = json_encode($request->getParams());

        $hash = hash_hmac('sha256', $content, $this->privateKey);

        $headers = array(
            sprintf('X-Public: %s', $this->publicKey),
            sprintf('X-Hash: %s', $hash),
        );

        $curl->setOption(CURLOPT_HTTPHEADER, $headers);
    }

}