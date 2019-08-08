<?php

declare(strict_types=1);

return [

    // Addresses Database Tables
    'tables' => [
        'addresses' => 'addresses',
    ],

    // Addresses Models
    'models' => [
        'address' => \App\Address::class,
    ],

    // Addresses Geocoding Options
    'geocoding' => false,

];
