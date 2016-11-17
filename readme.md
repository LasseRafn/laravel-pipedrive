## Laravel Pipedrive api

#Installation

1. Require using composer
````
composer require lasserafn/laravel-pipedrive
````

2. Add the PipedriveServiceProvider to your ````config/app.php```` providers array.
````
'providers' => [
    \LasseRafn\Pipedrive\PipedriveServiceProvider::class,
]
````