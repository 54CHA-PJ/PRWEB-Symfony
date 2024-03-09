------------------------------------------------
# SETUP

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

### INFO
```bash
symfony local:check:requirements
php bin/console about
```

### Check if the connection with the database is working
```bash
php bin/console app:database:test
```

### Symfony INIT
```bash
symfony server:start
```

### Cache
```bash
php bin/console cache:clear
```

------------------------------------------------
# DATABASE

### Map info
```bash
php bin/console doctrine:mapping:info
```

### Create/Update database
```bash
php bin/console doctrine:schema:create
php bin/console doctrine:schema:update --force
```

### Make Migration
```bash
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console doctrine:migrations:diff
```

### Drop database
```bash
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
```

### Load fixtures
```bash
php bin/console doctrine:fixtures:load
```

### Restart ID's
```SQL
ALTER SEQUENCE person_id_seq RESTART WITH 1;
ALTER SEQUENCE book_id_seq RESTART WITH 1;
ALTER SEQUENCE borrow_id_seq RESTART WITH 1;
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

### Create controller
```bash
php bin/console make:crud Entity
```

------------------------------------------------

# Controller

### Routes
```php
php bin/console debug:router
```