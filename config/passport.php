<?php
return [
    'promoter' => [
        'grant_type' => env('OAUTH_GRANT_TYPE', 1),
        'client_id' => env('OAUTH_CLIENT_ID_PROMOTER'),
        'client_secret' => env('OAUTH_CLIENT_SECRET_PROMOTER'),
        'scope' => env('OAUTH_SCOPE',"*")
    ],
    'client' => [
        'grant_type' => env('OAUTH_GRANT_TYPE',2),
        'client_id' => env('OAUTH_CLIENT_ID_USER'),
        'client_secret' => env('OAUTH_CLIENT_SECRET_USER'),
        'scope' => env('OAUTH_SCOPE','*')
    ],
];
