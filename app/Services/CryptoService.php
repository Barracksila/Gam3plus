<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CryptoService
{
    public function getPrices()
    {
        $response = Http::get('https://app.cryptoapis.io/api-keys', [
            'vs_currency' => 'usd',
            'order' => 'market_cap_desc',
            'per_page' => 10,
            'page' => 1,
            'sparkline' => false,
            'start' => 1,
            'limit' => 10,
            'convert' => 'USD',
        ]);

        return $response->json();
    }
}
