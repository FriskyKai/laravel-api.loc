## Установка проекта из репозитория
1. Склонируйте репозиторий
```shell
cd domains
git clone https://github.com/FriskyKai/laravel-api.loc.git
```

2. Перейдите в папку с проектом и установите composer-зависимости:
```shell
cd laravel-api.loc
composer install
```

3. Скопируйте файл .env.example в .env
```shell
copy .env.example .env
```

4. Сгенерируйте ключ шифрования
```shell
php artisan key:generate
```

5. Измените файл конфигурации .env (Пример для БД MySQL)
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Имя_БД
DB_USERNAME=Логин_пользователя_БД
DB_PASSWORD=Пароль_пользователя_БД

SESSION_DRIVER=file
```

6. gg

## Пустой проект
Создан в OpenServer следующими командами:

```shell
cd domains
mkdir laravel-api.loc
cd laravel-api.loc
composer self-update
composer create-project laravel/laravel .
php artisan install:api
php artisan config:publish cors
php artisan storage:link
```

В корне проекта создан файл .htaccess:
```php
RewriteEngine On
RewriteRule ^(.*)$ public/$1 [L]
```
