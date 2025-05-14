<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Options
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing.
    |
    */
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Define which routes are allowed to be accessed

    'allowed_methods' => ['*'], // Allow all HTTP methods (GET, POST, PUT, DELETE, etc.)
'allowed_origins' => [
    'http://localhost:8080',
    'http://localhost:5173',
],
 // Allow your frontend's URL (update this if needed)

    'allowed_origins_patterns' => ['/^https?:\/\/(localhost|yourdomain)\.com$/'], // Allow specific patterns, if needed

    'allowed_headers' => ['*'], // Allow all headers

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // Allow cookies (if needed)
];

