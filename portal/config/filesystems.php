<?php

return [

    'disks' => [
        'sqlite' => [
            'driver' => 'local',
            'root' => base_path('sqlite'),
        ],
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'), //Force Storage::disk('local') to use /storage/app instead of /storage/app/private.
        ],
    ],

];
