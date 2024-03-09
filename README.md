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
# DATABASE

### check if the connection with the database is working
```bash
php bin/console app:database:test
```

### map info
```bash
php bin/console doctrine:mapping:info
```

### Update database
```bash
php bin/console doctrine:schema:update --force
```

### Make Migration
```bash
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console doctrine:migrations:diff
```

------------------------------------------------
# DATA

### Create user
```bash
php bin/console make:user
```

### Create entity
```bash
php bin/console make:entity NameOfEntity
```
