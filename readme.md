# Domainr API Laravel Package

Domainr API Laravel Wrapper Package.

Supported API Version: **2**

## Installation

Add package to `composer.json` file.

```
"require": {
    "jungleteam/domainr": "1.*"
}
```

Update composer packages.

```
composer update
```

Add service provider to `config/app.php` file.

```
'providers' => [
    ...
    JungleTeam\Domainr\DomainrServiceProvider::class,
    ...
]
```

Add domainr facade to `config/app.php` file.

```
'aliases' => [
    ...
    'Domainr' => JungleTeam\Domainr\DomainrFacade::class,
    ...
]
```

Publish config file and edit `config/domainr.php`

```
php artisan vendor:publish --provider="JungleTeam\Domainr\DomainrServiceProvider"
```

## Usage

For detailed documentation please visit [Domainr API in Mashape](https://market.mashape.com/domainr/domainr) or [Domainr API in Domainr.build](http://domainr.build/docs)

### Search

```
Domainr::search($query, $location = null, $registrar = null, $defaults = null);
```

**Search suggestions related to the query**

```
Domainr::search("acme.coffee");
```

JSON data will be return.

```
[
   {
      "domain":"acme.coffee",
      "host":"",
      "subdomain":"acme.",
      "zone":"coffee",
      "path":"",
      "registerURL":"https:\/\/api.domainr.com\/v2\/register?client_id=mashape-salimgrsy&domain=acme.coffee&registrar=&source="
   },
   {
      "domain":"acme.cafe",
      "host":"",
      "subdomain":"acme.",
      "zone":"cafe",
      "path":"",
      "registerURL":"https:\/\/api.domainr.com\/v2\/register?client_id=mashape-salimgrsy&domain=acme.cafe&registrar=&source="
   },
   {
      "domain":"acme.com.tr",
      "host":"",
      "subdomain":"acme.",
      "zone":"com.tr",
      "path":"",
      "registerURL":"https:\/\/api.domainr.com\/v2\/register?client_id=mashape-salimgrsy&domain=acme.com.tr&registrar=&source="
   }
]
```

### Register

```
Domainr::register($domain, $registrar = null);
```

**Get HTTP Redirect url to a supporting registrar.**
```
Domainr::register("acme.coffee");
```

Redirect URL will be returned.

```
https://domains.google.com/registrar?s=acme.coffee&utm_campaign=domainr.com&utm_content=&af=domainr.com
```

### Status

```
Domainr::status($domain);
```

**Check domain availability**

```
Domainr::status("acme.coffee");
```

JSON data will be return.

```
[
   {
      "domain":"acme.coffee",
      "zone":"coffee",
      "status":"undelegated inactive",
      "summary":"inactive"
   }
]
```

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request

## License

Project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).