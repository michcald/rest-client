<?php

namespace Michcald\RestClient\Consumer;

class Get extends \Michcald\RestClient\Consumer
{
    public function execute()
    {
        $request = $this->getRequest();
        
        $url = $request->getUrl();

        if(count($request->getParams()) > 0) {
            $url .= '?' . http_build_query($request->getParams());
        }

        $curl = new \Michcald\RestClient\Curl();
        $curl->setOption(CURLOPT_TIMEOUT, 30)
            ->setOption(CURLOPT_URL, $url)
            ->setOption(CURLOPT_RETURNTRANSFER, true)
            ->setOption(CURLOPT_HTTPGET, true);
        
        if ($request->getAuth()) {
            $request->getAuth()->execute($curl);
        }

        $curl->execute();
        
        $response = new \Michcald\RestClient\Response();
        $response->setStatusCode($curl->getStatusCode())
            ->setContentType($curl->getContentType())
            ->setBody($curl->getResponse());

        return $response;
    }

}
