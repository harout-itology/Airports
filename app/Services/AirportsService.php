<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class AirportsService implements CurlServiceInterface
{
    const URL = 'https://rapidapi.p.rapidapi.com/v1/prices/direct';
    const HEADERS = [
        'host' => 'travelpayouts-travelpayouts-flight-data-v1.p.rapidapi.com',
        'key' => '92ff304593msh803ee221987940dp1ebc54jsnd1216e5769d0',
        'token' => '3964fcf8955a1fc642c9dce71c0aff84',
        'query' => false
    ];
    private $get_values;

    public function getValues($request)
    {
        $this->get_values = '/?destination='.$request->start_point.'&origin='.$request->end_point;
        return $this;
    }

    public function callAPI()
    {
        try {
            $response = (new Client)->get(self::URL.$this->get_values, [
                'headers' => [
                    'x-rapidapi-host'   => self::HEADERS['host'],
                    'x-rapidapi-key'    => self::HEADERS['key'],
                    'X-Access-Token'    => self::HEADERS['token'],
                    'useQueryString'    => self::HEADERS['query'],
                ]
            ]);
        }
        catch (GuzzleException $e) {
            return $e->getResponse();
        }
        return $response->getBody();
    }
}
