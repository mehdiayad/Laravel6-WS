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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'passport' => [
        'mamp_oauth_token_endpoint' => env('MAMP_PASSPORT_OAUTH_TOKEN_ENDPOINT'),
        'mamp_oauth_authorize_endpoint' => env('MAMP_PASSPORT_OAUTH_AUTHORIZE_ENDPOINT'),
        'mamp_client_secret' => env('MAMP_PASSPORT_CLIENT_SECRET'),
        'mamp_client_id' => env('MAMP_PASSPORT_CLIENT_ID'),
        'nginx_oauth_token_endpoint' => env('NGINX_PASSPORT_OAUTH_TOKEN_ENDPOINT'),
        'nginx_oauth_authorize_endpoint' => env('NGINX_PASSPORT_OAUTH_AUTHORIZE_ENDPOINT'),
        'nginx_client_secret' => env('NGINX_PASSPORT_CLIENT_SECRET'),
        'nginx_client_id' => env('NGINX_PASSPORT_CLIENT_ID'),
    ],

];
