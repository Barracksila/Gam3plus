<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CryptoService;


class CryptoController extends Controller
{

        protected $crypto;

        public function __construct(CryptoService $crypto)
        {
            $this->crypto = $crypto;
        }

        public function index()
        {
            $data = $this->crypto->getPrices();
            return view('index', compact('data'));
        }
}
