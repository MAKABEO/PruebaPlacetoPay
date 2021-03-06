<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'currency_conversion' =>[
        'base_uri' => env('CURRENCY_CONVERSION_BASE_URI'),
        'api_key' => env('CURRENCY_CONVERSION_API_KEY'),
    ],

    'placetopay' =>[
        'base_uri' => env('PLACE_TO_PAY_BASE_URI'),
        'login' => env('PLACE_TO_PAY_LOGIN'),
        'trankey' => env('PLACE_TO_PAY_TRANKEY'),
        'base_currency' => 'usd',
        'class' => App\Services\PlaceToPayService::class,
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
