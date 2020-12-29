<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'solicitud_incorporacion' => [
            'driver' => 'local',
            'root' => storage_path('app/public/archivos_ritex/solicitud_incorporacion'),
            'url' => env('APP_URL'). '/storage',
            'visibility' => 'public',

        ],

        'solicitud_modificacion' => [
            'driver' => 'local',
            'root' => storage_path('app/public/archivos_ritex/solicitud_modificacion'),
            'url' => env('APP_URL'). '/storage',
            'visibility' => 'public',

        ],

        'solicitud_ampliacion' => [
            'driver' => 'local',
            'root' => storage_path('app/public/archivos_ritex/solicitud_ampliacion'),
            'url' => env('APP_URL'). '/storage',
            'visibility' => 'public',

        ],

        'solicitud_retiro' => [
            'driver' => 'local',
            'root' => storage_path('app/public/archivos_ritex/solicitud_retiro'),
            'url' => env('APP_URL'). '/storage',
            'visibility' => 'public',

        ],

        'resolucion' => [
            'driver' => 'local',
            'root' => public_path('app/public/archivos_ritex/resoluciones'),
            'url' => env('APP_URL'). '/storage',
            'visibility' => 'public',

        ],

        'informe' => [
            'driver' => 'local',
            'root' => public_path('app/public/archivos_ritex/informes'),
            'url' => env('APP_URL'). '/storage',
            'visibility' => 'public',

        ],

        'informes_periciales' => [
            'driver' => 'local',
            'root' => storage_path('app/public/archivos_ritex/informes_periciales'),
            'url' => env('APP_URL'). '/storage',
            'visibility' => 'public',

        ],

        'temporales' => [
            'driver' => 'local',
            'root' => storage_path('app/public/archivos_ritex/temporales'),
            'url' => env('APP_URL'). '/storage',
            'visibility' => 'public',

        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
