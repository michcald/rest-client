<?php

namespace Michcald\RestClient\Consumer;

class Put extends \Michcald\RestClient\Consumer
{
    public function execute()
    {
        $request = $this->getRequest();

        $data = http_build_query($request->getParams());
        
        $putData = tmpfile();
        fwrite($putData, $data);
        fseek($putData, 0);
        
        $curl = new Rest_Request_Curl();
        $curl->setOption(CURLOPT_TIMEOUT, 30)
                ->setOption(CURLOPT_URL, $request->getUrl())
                ->setOption(CURLOPT_RETURNTRANSFER, true)
                ->setOption(CURLOPT_PUT, true)
                ->setOption(CURLOPT_INFILE, $putData)
                ->setOption(CURLOPT_INFILESIZE, strlen($data));

        if ($request->getAuth()) {
            $request->getAuth()->execute($curl);
        }

        $curl->execute();
        
        fclose($putData);

        $response = new \Michcald\RestClient\Response();
        $response->setStatusCode($curl->getStatusCode())
            ->setContentType($curl->getContentType())
            ->setBody($curl->getResponse());

        return $response;
    }
}
