<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    'authentic' => env('AUTHENTIC', 'true'),


    'aliases' => Facade::defaultAliases()->merge([
        'DataTables' => Yajra\DataTables\Facades\DataTables::class,
        'Zip' => ZanySoft\Zip\ZipFacade::class,
    ])->toArray(),

];
