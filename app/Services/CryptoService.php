<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;


class CryptoService
{
    private $client;
    private $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = 'c67a4bad-b124-44a3-8e00-42f2b015082e';
    }

    public function getLatest($userInput): ?array
    {
        try {
            $response = $this->client->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest', [
                'headers' => [
                    'Accepts' => 'application/json',
                    'X-CMC_PRO_API_KEY' => $this->apiKey
                ],
                'query' => [
                    'limit' => $userInput,
                    'convert' => 'EUR'
                ]
            ]);

            $data = json_decode($response->getBody()->getContents())->data;
            return $data;
        } catch (GuzzleException $e) {
            return null;
        }
    }
}
