<?php

namespace Baraveli\AirlineHttp;

use GuzzleHttp\Client as GuzzleClient;

class Client 
{
    private $client;

    public $statusCode;

    public function __construct()
    {
        $this->client = new GuzzleClient();
    }

    public function get(string $url) : array
    {
        $response = $this->client->request('GET', $url);
        $this->statusCode = $response->getStatusCode();

        return json_decode(json_encode(simplexml_load_string($response->getBody())), true);
    }
}