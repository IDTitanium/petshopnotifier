## PETSHOP NOTIFIER PACKAGE

This package is built to provide you with an easy way to trigger teams notifications whenever there is an order status update.

By simply calling a Facade. 

```
PetShopNotifier::notify($orderUuid, $newStatus, $updateAt)
```

### Installation

This package is still in development and not yet available on packagist. Hence, you will have to require it as a local dependency.

Steps

- Clone the repo
- Set the `repositories` section in you `composer.json` file. Like this.
```
"repositories": [
        {
            "type": "path",
            "url": "packages/petshop-notifier"
        }
    ]
```

If you are running your project on docker using docker-compose. You will have to map volumes in your `docker-compose` file, and the set the `url` key above to the path where the package lives in the docker container based on the mapped volume.

E.g.

My docker-compose app lives at `/usr/src/app`
So I have mapped my docker compose volume like this.

`- ../packages/petshop-notifier:/usr/src/app/packages/petshop-notifier`

This package exists on my `../packages` directory locally (relative to main laravel app).

- Next, you can run `composer require idtitanium/petshopnotifier` to install the package. 
If you are using docker, you should run this within the docker container.
i.e. `docker exec -it containerNameOrId bash`.

- Important to note: This package requires php 8.2 and has been built for use with Laravel 10.


### Usage

To use this package is quite straightforward.

Import

`use IDTitanium\PetShopNotifier\Facades\PetShopNotifier;`

And simply call the Facade wherever you quite the notification to be sent.

```
PetShopNotifier::notify($orderUuid, $newStatus, $updateAt)
```

`$orderUuid` has to be a string.
`$newStatus` has to be a string.
`$updatedAt` has to be a string.


### Testing

This package has tests witten with PHPUnit. To run the test simply run

`vendor/bin/phpunit`