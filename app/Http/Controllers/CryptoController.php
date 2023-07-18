<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CryptoController extends Controller
{
    private $client;
    private $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('COINMARKETCAP_API_KEY');
    }

    public function index()
    {
        // Retrieve the CoinMarketCap API key from the .env file
        $apiKey = env('COINMARKETCAP_API_KEY');

        // CoinMarketCap API endpoint
        $endpoint = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';

        // Make the API request
        $client = new Client();
        $response = $client->get($endpoint, [
            'headers' => [
                'X-CMC_PRO_API_KEY' => $apiKey,
            ],
            'query' => [
                'limit' => 25,
                'convert' => 'EUR',
            ],
        ]);

        // Decode the response
        $data = json_decode($response->getBody(), true);
        $coins = $data['data'];

        // Pass the data to the view
        return view('DashViews.crypto', compact('coins'));
    }
}
