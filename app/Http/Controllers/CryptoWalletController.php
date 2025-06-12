<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CryptoWalletController extends Controller
{
    public function show()
    {
        $apiKey = env('CRYPTO_API_KEY');
        $walletAddress = 'your_wallet_address';

        // Example API call (e.g., Etherscan or any blockchain API)
        $response = Http::get("https://api.cryptoapi.com/wallet/$walletAddress", [
            'apikey' => $apiKey
        ]);

        $walletData = $response->json();

        return view('wallet', compact('walletData'));
    }
}
