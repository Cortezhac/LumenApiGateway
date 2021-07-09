<?php

namespace App\Traits;
use GuzzleHttp\Client;

trait ConsumesExternalService {
    /**
     * Send to request to any service
     * @param $method
     * @param $requestUri
     * @param array $formParams
     * @param array $headers
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function perfomRequest($method, $requestUri, $formParams = [] , $headers = []){
        $client = new Client([
           'base_uri' => $this->baseUri
        ]);

        $response = $client->request($method, $requestUri, [
            'form_params' =>$formParams,
            'headers' => $headers
        ]);

        return $response->getBody()->getContents();
    }
}
