# SievedEloquentUserProvider

Laravel package providing a `UserProvider` to be used in development that allows to authenticate
without entering the password as any user (already in the DB).

Copyright (C) 2020 Pascal Hurni <[https://github.com/phurni](https://github.com/phurni)>

Licensed under the [MIT License](http://opensource.org/licenses/MIT).

## Installation

Add the package to your composer file:

```
composer require mortimer/sieved-eloquent-user-provider
```

Then add the service provider in `config/app.php`:

```php
    'providers' => [
        ...
        Mortimer\SievedEloquent\ServiceProvider::class,
        ...
    ],
```

## Configuration

If you aldready have the `eloquent` user provider for your authentication (see file `config/auth.php`), then
modify it with something like that:

```php
    'providers' => [
        'users' => [
            'driver' => env('AUTH_USERS_PROVIDER_DRIVER', 'eloquent'),    // <-- changed line
            'model' => App\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],
```

This will fetch the provider from the `.env` file and will default to the previous value `eloquent`.

Then in your development `.env` add this line

```
AUTH_USERS_PROVIDER_DRIVER = sieved_eloquent
```

Now at your regular login screen, enter a _valid_ username and **any** password it you'll get logged.
