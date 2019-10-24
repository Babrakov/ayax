# Test for AYAX

## Overview

Тестовое приложение для АЯКС

## Start

```
$ git clone https://github.com/Babrakov/ayax.git
$ cd ayax
$ cp .env.example .env
```
Настроить параметры подключения к БД в .env
```
$ php artisan key:generate
$ php artisan migrate
```
Настроить владельца каталога. Для apache:
```
$ sudo chown -R www-data:www-data ../ayax
```

## Demo

Пример доступен [по адресу test4ayax.ml](http://test4ayax.ml)
