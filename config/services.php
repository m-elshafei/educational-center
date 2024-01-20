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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


    'google' => [
        'client_id' => '481342748652-e3dhb33pif9s8uhppg3ens7qsfccgnf1.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback'
    ],

    'facebook' => [
        'client_id' => '391337223399835',
        'client_secret' => '7ca653e5163bdc897f9bb68b6a09b12a',
        'redirect' => 'http://127.0.0.1:8000/auth/facebook/callback'
    ],

];
