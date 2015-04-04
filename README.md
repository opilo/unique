installation
------------
For install this package Edit your project's ```composer.json``` file to require parsidev/unique

```php
"require": {
    "parsidev/unique": "dev-master"
},
```

Now, update Composer:
```
composer update
```

Once composer is finished, you need to add the service provider. Open ```config/app.php```, and add a new item to the providers array.
```
'Parsidev\Unique\UniqueServiceProvider',
```
Next, add a Facade for more convenient usage. In ```config/app.php``` add the following line to the aliases array:
```
'Unique' => 'Parsidev\Unique\Facades\Unique',
```

Publish config files:
```
php artisan vendor:publish
```
for change username, password and other configuration change ```config/pars_unique.php```

