<?php
namespace App\MyLib\Express;

use GuzzleHttp\Client;

trait ERequest {
    
    public function request($url, Array $option=[], $method = 'GET'){
        $client = new Client();
        $response = [];
        try {
            $response = $client->request($method,$url,$option);
            $response = [
                'status' => $response->getStatusCode(),
                'data' => $response->getBody()->getContents()
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 0,
                'data' => $e->getMessage()
            ];
        }
        return $response;
    }
    
    public function getXml($url, Array $option){
        $this->request($url, $option, 'GET');
    }
    
    public function query($url, $data = '', $headers = '', $method = 'POST') {
        $option = [
            'body'=>$data,
            'headers' => $headers
        ];
        return $this->request($url, $option, $method);
    }
    
}
