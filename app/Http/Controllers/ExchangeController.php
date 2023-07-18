<?php declare(strict_types=1);

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ExchangeController extends Controller
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getData(): object
    {
        $data = "https://www.latvijasbanka.lv/vk/ecb.xml";
        $response = file_get_contents($data);
        return simplexml_load_string($response);
    }

    public function convertCurrency(float $amount, string $id): ?float
    {
        $data = $this->getData();

        foreach ($data->Currencies->Currency as $currency) {
            if ((string) $currency->ID === $id) {
                $rate = (float) $currency->Rate;

                return round($amount * $rate, 2);
            }
        }

        return null;
    }

    public function index(Request $request)
    {
        $searchedCurrency = $request->input('currency');
        $exchangeRate = null;

        if ($searchedCurrency) {
            $exchangeRate = $this->convertCurrency(1, $searchedCurrency);
        }

        // Get the exchange rate data for other currencies
        $data = $this->getData();

        return view('DashViews.currency_exchange', [
            'searchedCurrency' => $searchedCurrency,
            'exchangeRate' => $exchangeRate,
            'currencies' => $data->Currencies->Currency,
        ]);
    }
}
