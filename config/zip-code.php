<?php

use App\Services\ZipCode\ViaCep\ViaCep;

return [
    'default' => env('ZIP_CODE_PROVIDER', 'via_cep'),

    'providers' => [
        'via_cep' => [
            'class' => ViaCep::class,
            'url' => env('ZIP_CODE_VIA_CEP_URL', 'https://viacep.com.br/ws/{zip_code}/json/'),
        ],
    ],
];
