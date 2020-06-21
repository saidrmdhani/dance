<?php

return [
    'consumer_key' => env('CONSUMER_KEY', 'YOUR_CONSUMER_KEY'),
    'consumer_secret' => env('CONSUMER_SECRET', 'YOUR_CONSUMER_SECRET'),
    'oauth_callback' => env('APP_URL'). env('OAUTH_CALLBACK', '/twitter_oauth')
];
