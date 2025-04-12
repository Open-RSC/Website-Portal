<?php

return [

    'mailers' => [
        'mailgun' => [
            'transport' => 'mailgun',
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],
    ],

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'noreply@rsc.vet'), //Warning: some SMTP providers will not allow a custom from address, only a custom from name, which can lead to email address exposure.
        'name' => env('MAIL_FROM_NAME', 'OpenRSC'),
    ],

];
