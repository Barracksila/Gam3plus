<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CryptoService
{
    public function getPrices()
    {
        $response = Http::get('https://api.coingecko.com/api/v3/coins/markets', [
            'vs_currency' => 'usd',
            'order' => 'market_cap_desc',
            'per_page' => 10,
            'page' => 1,
            'sparkline' => false,
        ]);

        return $response->json();
    }
}
