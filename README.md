installation
------------
To install this package edit your project's ```composer.json``` file to require parsidev/unique:

```php
"require": {
    "parsidev/unique": "dev-master"
},
```

Now, update Composer:
```
composer update
```

Once composer is finished, you need to add the service provider. Open ```config/app.php``` and add a new item to the providers array.
```
'Parsidev\Unique\UniqueServiceProvider',
```
For more convenient you can create a Facade. Add the following line in ```config/app.php```  to the aliases array:
```
'Unique' => 'Parsidev\Unique\Facades\Unique',
```


To generate an unique id use the ``generate`` method.
```
echo Unique::generate();
```
