------------------------------------------------
# INIT

### Composer app
```bash
php D:\XAMPP\composer.phar
```
this command == composer in the following commands

### Symfony app
```bash
symfony new prweb --version="6.3.*" --webapp
cd prweb
composer require doctrine/annotations
composer require symfony/security-bundle 
composer install
```

------------------------------------------------
# SERVER

### Symfony setup
```bash
symfony local:check:requirements
php bin/console about
symfony server:start
```

------------------------------------------------
# COMPOSER

### Reset Composer
```bash
del composer.lock
rmdir /s /q vendor
composer update
```

### Requirements
```bash
composer require symfony/runtime
```	

### MakeBlunder
```bash
```

------------------------------------------------
# DATABASE

### check if the connection with the database is working
```bash
php bin/console app:database:test
```

### map info
```bash
php bin/console doctrine:mapping:info
```

### Generate entities (TP PRWEB) : NOT WORKING on 6.x.x
```bash
php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity
``` 

### Alternative 
```bash
php bin/console doctrine:mapping:convert xml ./config/doctrine --from-database --force
php bin/console doctrine:generate:entities ./src/Entity
```