# slim-boilerplate
A slim framework boilerplate with MVC, ready to use for your project

## Features
1. Slim v4
2. PHP-DI Container
3. Eloquent ORM
4. MVC
5. Symfony Var Dumper
6. Dynamic Basepath

## Quick Installation
```bash
composer create-project --prefer-dist satmaxt/slim-boilerplate stdev
```

Change ``stdev`` to your project name

### Install  Dependency
```bash
composer install
```

### Configure Database Connection
Open file ``configs/database.php``
```php
return [
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'yourdbname',
    'username'  => 'yourdbusername',
    'password'  => 'yourdbpassword',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];
```
and change it with your database information

## Deployment
Open file ``bootstrap/app.php`` and find this line:
```php
$app->addErrorMiddleware(true, true, true);
```
change the first argument to ``false`` and save it.

### Install Dependency
```bash
composer install --optimize-autoloader --no-dev
```

## License
This bolerplate is licensed under the MIT license. See [License File](LICENSE) for more information.

Copyright &copy; 2019. Satria Aji Putra