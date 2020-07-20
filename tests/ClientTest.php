<?php

use Baraveli\AirlineHttp\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
     /** @test */
    public function sends_an_http_get_request_to_flight_api()
    {
        $client = new Client;
        $client->get("http://www.fis.com.mv/xml/arrive.xml");

        $this->assertEquals(200, $client->statusCode);
    }

     /** @test */
    public function it_parse_flightdata_xml_and_return_as_an_array()
    {
        $client = new Client;
        $response = $client->get("http://www.fis.com.mv/xml/arrive.xml");

        $this->assertIsArray($response);
    }

     /** @test */
    public function check_if_the_returned_data_is_valid()
    {
        $client = new Client;
        $response = $client->get("http://www.fis.com.mv/xml/arrive.xml");

        $this->assertArrayHasKey("UpdateTime", $response);
        $this->assertArrayHasKey("Flight", $response);
    }
}